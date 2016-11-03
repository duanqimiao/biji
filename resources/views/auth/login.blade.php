@extends('auth.layout')

@section('title')
   登录
@endsection
@section('content')
    @include('partials.errors')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">电子邮箱</label>
            <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">密码</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> 记住我
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-success " style="width:100%;height:35px">登录</button>

            </div>
        </div>
        <div class="form-group" style="font-size: 1.2rem">
            <div class="col-md-6 col-md-offset-4">
                没有账号？ <a href="/auth/register/" >马上注册</a>
            </div>
            <div class="col-md-6 col-md-offset-9">
                <a href="{{ url('password/email') }}" >忘记密码？</a>
            </div>
        </div>

    </form>
@endsection