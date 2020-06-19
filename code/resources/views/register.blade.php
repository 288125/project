<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>注册</title>
    </head>
    <body>
    <div style="margin: auto;width: 500px;margin-top: 100px">
        <center><h3>注册</h3></center>
        <form action="/add_user" method="post">
            <div class="form-group">
                <label>用户名:</label>
                <input type="text" id="name" name="name"><span id="info"></span><br>
            </div>
            <div class="form-group">
                <label>密码:</label>
                <input type="password" id="password" name="password"><br>
            </div>
            <div class="form-group">
                <strong>邮箱:</strong>
                <input type="text" id="email" name="email"><br>
            </div>
            <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
            <input type="submit" value="注册">
        </form>
    </div>
    </body>
</html>
