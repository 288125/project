<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>TODO</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <script>
        function del_friend(id) {
            //用户安全提示
            if (confirm("您确定要删除吗？")){
                location.href = "delete_friend?id="+id;
            }
        }
        window.onload = function () {
            //删除选中的记录
            document.getElementById("delete_Select_list").onclick = function () {
                //表单提交
                if (confirm("您确定要删除选中条目吗？")) {
                    let flag = false;
                    //判断是否有选中条目
                    let cbs = document.getElementsByName("uid");
                    for (let i = 0; i < cbs.length; i++) {
                        if (cbs[i].checked){
                            flag = true;
                            break;
                        }
                    }
                    if (flag) {
                        document.getElementById("form").submit();
                    }
                }
            }
            //全选功能 使checked状态相同
            document.getElementById("firstCb").onclick = function () {
                let cbs = document.getElementsByName("uid");
                for (let i = 0; i < cbs.length; i++) {
                    cbs[i].checked = this.checked;
                }
            }
        }
    </script>
    <body>
    <div style="width: 650px; margin:auto; margin-top: 50px">
        <div style="float: left">
            <a href="add_list">添加</a>
            <a href="TODO_all">全部</a>
            <a href="show_list_doing">进行中</a>
            <a href="show_list_done">已完成</a>
            <a href="delete_list_done">删除已完成</a>
            <div style="float: left" class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    好友
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    @foreach($friend as $val)
                        <li><a href="javascript:del_friend({{$val->id}});">{{$val->friend}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div style="float: right;margin: 7px">
            <a href="javascript:void(0);" id="delete_Select_list">删除选中</a>
            <button type="submit" onclick="out();">返回</button>
        </div>
        <form id="form" action="delete_Select_list" method="post">
            <table border="1" style="width: 600px;text-align: center">
                <thead>
                <tr>
                    <th><input type="checkbox" id="firstCb"></th>
                    <th style="text-align: center">项目</th>
                    <th style="text-align: center">状态</th>
                    <th style="text-align: center" >操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $val)
                    <tr>
                        <th><input type="checkbox" name="uid" value="{{$val->id}}"></th>
                        <td>{{$val->item}}</td>
                        <td>{{$val->status}}</td>
                        <td>
                            <a href="update_list?id={{$val->id}}">修改</a>
                            <a href="delete_Select_list?uid={{$val->id}}">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </div>
    <div style="width: 650px; margin:auto; margin-top: 50px">
        <div style="float: left">
            <form action="TODO_all" method="post" style="text-align: center">
                <div >
                    <label for="exampleInputName1">姓名</label>
                    <input type="text" name="name" id="exampleInputName1" value="{{Session::get('s_name')}}">
                </div>
                <div >
                    <label for="exampleInputEmail">邮箱</label>
                    <input type="text" name="email" id="exampleInputEmail" value="{{Session::get('s_email')}}">
                </div>
                <button type="submit">查询</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </form>
        </div>

        <table border="1" style="width: 600px">
            <thead>
            <tr>
                <th style="text-align: center">名称</th>
                <th style="text-align: center">邮箱</th>
                <th style="text-align: center">操作</th>
            </tr>
            </thead>
            <tbody>
            @if($user)
                @foreach($user as $val)
                    <tr>
                        <td>{{$val->name}}</td>
                        <td>{{$val->email}}</td>
                        <td>
                            <a href="add_friend?friend={{$val->name}}">添加</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    </body>
    <script>
        function out() {
            location.href = "{{'login_Success'}}";
        };
    </script>
    </html>
</DOCTYPE>
