

@extends('layouts.login')
<style>
    body{
        background-image:url('../images/hero_1.jpg') ;
    }
</style>
@section('content')
    <div class="limiter">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>@lang('quickadmin.qa_whoops')</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
                <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-login">

            <div class="wrap-login">

                <div class="login-pic">
                    <img src='../images/img-01.png' alt="">
                </div>
                <form class="form-horizontal login-form"
                      role="form"
                      method="POST"
                      action="{{ url('login') }}">
 <span class="login-form-title">
 Member Login
 </span>

                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">

                    @if($message = Session::get('success'))
                        <div class="alert alert-warning">
                            <p>{{$message}}</p>
                        </div>
                    @endif
                    @if($message = Session::get('warning'))
                        <div class="alert alert-warning">
                            <p>{{$message}}</p>
                        </div>
                    @endif
                    <div class="wrap-input">
                        <input type="email"
                               class="form-control input"
                               name="email"
                               value="{{ old('email') }}">
                        <span class="focus-input"></span>

                        <span class="symbol-input">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input">
                        <input type="password"
                               class="form-control input"
                               name="password"
                               value="{{ old('password') }}">
                        <span class="focus-input"></span>

                        <span class="symbol-input">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="text-center p-t-12">
                        <a class = "txt2"  href="{{ route('auth.password.reset') }}">@lang('quickadmin.qa_forgot_password')</a>

                    </div>

                    <div class="container-login-form-btn">
                        <button type="submit"  class="login-form-btn">
                            @lang('quickadmin.qa_login')
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{route('register')}}">
                            @lang('quickadmin.qa_create_account')
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
