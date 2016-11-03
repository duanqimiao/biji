<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Hello World</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script language="JavaScript" src="{{ URL::asset('/') }}js/jquery.js"></script>
    <script type="text/javascript" src="{{ URL::asset('/') }}js/bootstrap.js"></script>
</head>
<body style="overflow-x: hidden">
    <div class="jumbotron" >
        <div style="margin: 40px;">
            <h1>Hello, world!</h1>
            <p>很高兴认识你！想要更多的了解我们吗？</p><a href="{{ url('/biji') }}">返回笔记</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-6">
            <a href="#" class="thumbnail">
                <img src="{{ asset('/images/guide01.png') }}" alt="...">
            </a>
        </div>
        <div class="col-xs-6 col-md-6">
            <a href="#" class="thumbnail">
                <img src="{{ asset('/images/guide02.png') }}" alt="...">
            </a>
        </div>
        <div class="col-xs-6 col-md-6">
            <a href="#" class="thumbnail">
                <img src="{{ asset('/images/guide03.png') }}" alt="...">
            </a>
        </div>
    </div>
</body>
</html>
