<?php

namespace App\Http\Controllers;

use App\Friend;
use App\MyList;
use Illuminate\Http\Request;
use App\User;
use App\Home;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class XMController extends Controller
{
    public function login(){//登录
        return view('login');
    }
    public function out(){//登出
        return view('login');
    }
    public function register(){//注册
        return view('register');
    }
    public function add_user(Request $request){//增加用户
    $var = User::create([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'password' => $request->get('password')
    ]);
    if ($var){
        return view('login');
    }
    else{
        dump("aaa");
    }
    }
    public function login_Check(Request $request){//检测登录
        $name = $request->get('name');
        $password = $request->get('password');
        $email = $request->get('email');
        $users = User::all();
        $JC = false;
        foreach ($users as $user){
            if ($user->name == $name && $user->password == $password && $user-> email ==$email){
                $JC = true;
            }
        }
        if ($JC){
            Session::put('name',$name);
            return redirect("/login_Success");
        }else{
            print ("<a href='login'>登录失败,请重新登录</a>！");
        }
    }
    public function login_Success(){//登录成功
        $name = Session::get('name');
        $data = DB::table('home')->where('name',$name)->orWhere('share','like','%'.$name.'%')->paginate(100);
        return view('home',compact('data'));
    }
    public function insert_things(){//添加事件
        return view('insert');
    }
    public function insert_things_Check(Request $request){//检测添加
        $name = Session::get('name');
        $work = $request->get('work');
        $status = $request->get('status');
        $share = $request->get('share');
        $result = Home::create(['name'=>$name,'work' => $work, 'status' => $status, 'share' => $share.' ']);
        if ($result){
            return redirect("/login_Success");
        }else{
            print ("<a href='insert_things'>添加失败,请重新添加</a>！");
        }
    }
    public function accept_things(Request $request){
        $name = Session::get('name');
        $id = $request->get('id');
        $var = Home::find($id);
        $share = $var->share;
        if (strpos($share,$name.'已接受 ') !== false){
        }
        elseif (strpos($share,$name.'未接受 ') !== false){
            $str = str_replace($name.'未接受 ', $name.'已接受 ', $share);
            Home::where('id',$id) -> update(['status'=>'进行中','share'=>$str]);
        }
        else{
            $str = str_replace($name, $name.'已接受 ', $share);
            Home::where('id',$id) -> update(['status'=>'进行中','share'=>$str]);
        }
        return redirect("/login_Success");
    }
    public function not_accept_things(Request $request){
        $name = Session::get('name');
        $id = $request->get('id');
        $var = Home::find($id);
        $share = $var->share;
        if (strpos($share,$name.'未接受 ') !== false){
        }
        elseif (strpos($share,$name.'已接受 ') !== false){
            $str = str_replace($name.'已接受 ', $name.'未接受 ', $share);
            Home::where('id',$id) -> update(['status'=>'待接受','share'=>$str]);
        }
        else{
            $str = str_replace($name, $name.'未接受 ', $share);
            Home::where('id',$id) -> update(['status'=>'待接受','share'=>$str]);
        }
        return redirect("/login_Success");
    }
    public function update_things(Request $request){//修改事件
        $id = $request->get('id');
        Session::put('id',$id);
        $data = Home::find($id);
        return view('update_things',compact('data'));
    }
    public function update_things_Check(Request $request){//修改事件检测
        $id = Session::get('id');
        $work = $request->get('work');
        $status = $request->get('status');
        $share = $request->get('share');
        Home::where('id', $id) -> update(['work' => $work, 'status' => $status, 'share' => $share.' ']);
        return redirect("/login_Success");
    }
    public function delete_things(Request $request){//删除事件
        $id = $request->get('id');
        $result = Home::where('id', $id)->delete();
        if ($result){
            return redirect("/login_Success");
        }else{
            print ("<a href='login_Success'>删除失败,请重新删除</a>！");
        }
    }
    public function TODO(Request $request){
        $id = $request->get('id');
        Session::put('id',$id);
        return redirect('TODO_all');
    }
    public function TODO_all(Request $request){
        $id = Session::get('id');
        $name = Session::get('name');
        if (Session::has('进行中')){
            $data = DB::table('myList')->where('home_id',$id)->where('status','进行中')->paginate(100);
            Session::forget('进行中');
        }elseif (Session::has('已完成')){
            $data = DB::table('myList')->where('home_id',$id)->where('status','已完成')->paginate(100);
            Session::forget('已完成');
        }else{
            $data = DB::table('myList')->where('home_id',$id)->paginate(100);
        }
        $friend = DB::table('friend')->where('name', $name)->get();
        $s_name = $request->get('name');
        $s_email = $request->get('email');
        if ($s_name || $s_email){
            Session::put('s_name',$s_name);
            Session::put('s_email',$s_email);
            if (!$s_email){
                $s_email = '无名氏';
            }
            if (!$s_name){
                $s_name = '123@qq.com';
            }
            $user = DB::table('user')->where('name', 'like', '%' . $s_name . '%')->orwhere('email', 'like', '%' . $s_email . '%')->get();
            return view('TODO',compact('data','friend','user'));
        }else {
            $user = false;
            return view('TODO', compact('data', 'friend','user'));
        }
    }
    public function add_list(){//增加列表
        return view('add_list');
    }
    public function add_list_Check(Request $request){//增加列表判断
        $id = Session::get('id');
        $item = $request->get('item');
        $status = $request->get('status');
        $result = MyList::create(['item' => $item, 'status' => $status, 'home_id' => $id]);
        if ($result){
            return redirect('TODO_all');
        }else{
            print ("<a href='add_list'>添加失败,请重新添加</a>！");
        }
    }
    public function show_list_doing(){//展示正在进行的部分
        Session::put('进行中','进行中');
        return redirect('TODO_all');
    }
    public function show_list_done(){//展示已经完成的部分
        Session::put('已完成','已完成');
        return redirect('TODO_all');
    }
    public function delete_list_done(){//删除已经完成的部分
        MyList::where('status','已完成')->delete();
        return redirect('TODO_all');
    }
    public function update_list(Request $request){//更新列表
        $id = $request->get('id');
        $data = MyList::find($id);
        return view('update_list',compact('data'));
    }
    public function update_list_Check(Request $request){//更新列表确认
        $id = $request->get('id');
        $item = $request->get('item');
        $status = $request->get('status');
        MyList::where('id',$id)->update(['item'=>$item,'status'=>$status]);
        return redirect('TODO_all');
    }
    public function delete_Select_list(Request $request){//选择删除
        $id = $request->input('uid');
        MyList::where('id',$id)->delete();
        return redirect('TODO_all');
    }
    public function add_friend(Request $request){//增加好友
        $name = Session::get('name');
        $friend = $request->get('friend');
        Friend::create(['name'=>$name,'friend'=>$friend]);
        return redirect('TODO_all');
    }
    public function delete_friend(Request $request){//删除好友
        $id = $request->get('id');
        Friend::where('id',$id)->delete();
        return redirect('TODO_all');
    }
}
