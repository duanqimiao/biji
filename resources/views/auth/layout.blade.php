<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    {{--�ƶ�����Ӧʽwebҳ����������--}}
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <title>“笔友”BE YOURSELF</title>

    <link type="text/css" rel="stylesheet" href="{{ asset('css/auth.css') }}"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    @yield('script')

    {{--ý���ѯ--}}
    <style type="text/css">
        /*html ��Ĭ�� font-size=10px*/
        html{
            font-size:62.5%;
        }

        /* ��С��Ļ���ֻ�С�� 768px�� */
        @media (max-width: 768px) {
            body{
                background: #ccc;
            }
        }

        /* С��Ļ��ƽ�壬���ڵ��� 768px�� */
        @media (min-width: 768px) and (max-width: 1200px) {
            body{
                background: #ccc;
            }
        }

        /* ����Ļ����������ʾ�������ڵ��� 1200px�� */
        @media (min-width: 1200px) {
            body{
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
<div class="container" style="margin: 50px auto;">
    <div class="container-fluid">
        <div class="row">
            @yield('return')
            <div class="col-md-5 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">@yield('title')</h3>
                    </div>
                    <div class="panel-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>