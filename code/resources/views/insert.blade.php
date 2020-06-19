<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>添加</title>
    </head>
    <body>
    <div style="width: 700px">
        <center><h3>添加事件</h3></center>
        <form action="insert_things_Check" method="post">
            <div class="form-group">
                <label for="work">工作：</label>
                <input type="text"  id="work" name="work">
            </div>
            <div class="form-group">
                <label for="status">状态：</label>
                <input type="text" name="status" id="status">
            </div>
            <div class="form-group">
                <label for="share" >分享：</label>
                <input type="text"  id="share" name="share">
            </div>
            <div class="form-group">
                <input type="submit" value="提交" style="margin-left: 250px">
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </div>
    </body>
    </html>
</DOCTYPE>
