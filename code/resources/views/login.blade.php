<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>登录</title>
    </head>
    <body>
    <div style="margin: auto;width: 500px;margin-top: 100px">
        <center><h3>登录</h3></center>
        <form action="login_Check" method="post">
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
            <input type="button" onclick="register();" value="注册">
            <input type="submit" id="login" value="登录">
        </form>
    </div>
    </body>
    <script>
        function register() {
            location.href = "{{'register'}}";
        };
    </script>
</html>
