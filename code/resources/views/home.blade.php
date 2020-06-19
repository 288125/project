<DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>主页</title>
</head>
<body>
<div style="width: 700px;margin: auto;margin-top: 50px">
    <center><h5>{{Session::get ('name')}}的主页</h5></center>
    <div style="float: left">
        <button onclick="insert_things();">添加</button>
    </div>
    <div style="float: right;margin: 5px">
        <button onclick="out();">登出</button>
    </div>
    <table border="2">
        <thead>
        <tr>
            <th>列表</th>
            <th>工作</th>
            <th>状态</th>
            <th>创建者</th>
            <th>分享</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $val)
            <tr>
                <th><a href="TODO?id={{$val->id}}">查看</a></th>
                <td>{{$val->work}}</td>
                <td>{{$val->status}}</td>
                <th>{{$val->name}}</th>
                @if(Session::get('name') != $val->name)
                    <td>{{$val->share}}</td>
                    <td>
                        <a href="accept_things?id={{$val->id}}">接受</a>
                        <a href="not_accept_things?id={{$val->id}}">不接受</a>
                    </td>
                @endif
                @if(Session::get('name') == $val->name)
                    <td>{{$val->share}}</td>
                    <td>
                        <a href="update_things?id={{$val->id}}">修改</a>
                        <a href="delete_things?id={{$val->id}}">删除</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
</div>
</body>
<script>
    function insert_things() {
        location.href = "{{'insert_things'}}";
    };
    function out() {
        location.href = "{{'out'}}";
    };
</script>
</html>
</DOCTYPE>
