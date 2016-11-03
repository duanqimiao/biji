<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    {{--移动或响应式web页面缩放设置--}}
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum=1.0,user-scalable=no">
    <title>笔记信息</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        html{
            font-size:62.5%;
        }
        .info{
            font-family: gotham,helvetica,arial,sans-serif;
            color: #4a4a4a;
            font-size: 1.3rem;
            font-weight: 400;
        }
        .p{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div style="margin: 20px auto;">
        <div style="text-align: center;" >
            <span style="font-size: 3.5rem;color: #666;" class="glyphicon glyphicon-info-sign"></span>
            <h4 style="color: #999;">笔记信息</h4>
            <h3 style="color: #666;">{{ $biji->title }}</h3>
        </div><br/>
        <div style="color: #666;text-align: center">
            <p class="p">创建时间：<span class="info">{{ $biji->created_at }}</span></p>
            <p class="p">更新时间：<span class="info">{{ $biji->updated_at }}</span></p>
            <p class="p">作者：<span class="info">{{ Auth::user()->name }}</span></p>
        </div>
        <div style="text-align: center">
            <a href="{{ url('/biji') }}"><input type="button" class="btn btn-default" style="width: 25%;" value="返回"/></a>
        </div>
    </div>
</body>
</html>
