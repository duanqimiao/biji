<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    {{--移动或响应式web页面缩放设置--}}
    <meta name="viewport" content="width=device-width,initial-scale=0.4,maximum-scale=1.0,user-scalable=no">
    <title>使用反馈</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script language="JavaScript" src="{{ URL::asset('/') }}js/jquery.js"></script>

    {{--引入Chart.js文件--}}
    <script language="JavaScript" src="{{ URL::asset('/') }}js/Chart.js"></script>

</head>
<body>
<div style="margin: 20px auto;width: 800px;">
    <div style="text-align: center;margin: 10px 0;" >
        <img src="{{ asset('/images/count.png') }}" alt=""/>
        <h4 style="color: #999;">登录次数</h4>
        <h3 style="color: #666;"></h3>
        <span style="color: #999;">（注：横坐标代表月份，纵坐标代表登录的次数）</span>
    </div>
    <div style="margin-top: 20px ;text-align: center;">
        <canvas id="canvas" height="400" width="700"></canvas>
    </div>
    <script type="text/javascript">
        $.ajax({
            type: "GET",
            url: "/chart/data",
            success:function(data){
                var time = [];
                $.each(data.time,function(index,values){
                    $.each(values,function (index,val) {
                        $.each(val,function (index,v) {
                            time.push(v);//数组动态赋值
                        })
                    })
                });

                //设置Y轴的浮点型改为整数
                var scaleSteps = 1;
                var max = Math.max.apply(null,time);
                var scaleOverride = true;
                var scaleStepWidth = Math.floor(max/scaleSteps);
                var Ymax = scaleStepWidth*scaleSteps;
                var scaleStartValue = 0;
                var config = [];
                config['scaleOverride'] = scaleOverride;
                config['scaleSteps'] = scaleSteps;
                config['scaleStepWidth'] = scaleStepWidth;
                config['scaleStartValue'] = scaleStartValue;

                var lineChartData = {
                    labels : ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
                    datasets : [
                        {
                            fillColor : "rgba(151,187,205,0.5)",
                            strokeColor : "rgba(151,187,205,1)",
                            pointColor : "rgba(151,187,205,1)",
                            pointStrokeColor : "#fff",
                            data : time
                        }
                    ],
                    configs : config
                };
                var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

            }
        }) ;
    </script>
    <br/>
    <div style="text-align: center">
        <a href="/secure"><input type="button" class="btn btn-default" value="返回" style="width: 30%"/></a>
    </div>
    </div>
</body>
</html>