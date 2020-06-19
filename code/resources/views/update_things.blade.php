<DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>修改</title>
    </head>
    <body>
    <div style="width: 700px">
        <center><h3>修改事件</h3></center>
        <form action="update_things_Check" method="post">
            <div class="form-group">
                <label for="work" >工作：</label>
                <input type="text" id="work" name="work" value="{{$data->work}}">
            </div>
            <div class="form-group">
                <label for="status">状态：</label>
                <input type="text" name="status" id="status" value="{{$data->status}}">
            </div>
            <div class="form-group">
                <label for="share" >分享：</label>
                <input type="text" id="share" name="share" value="{{$data->share}}">
            </div>
            <div class="form-group">
                <input type="submit" value="提交" style="margin-left: 300px">
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </div>
    </body>
    </html>
</DOCTYPE>
