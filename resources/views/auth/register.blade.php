

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
                      action="{{ route('register') }}">
 <span class="login-form-title">
 {{__('Register')}}
 </span>

                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">

                    <div class="wrap-input">
                        <input type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} input"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="Name"
                               autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                        <span class="focus-input"></span>

                        <span class="symbol-input">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                    </div>
                    <div class="wrap-input">
                        <input type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input"
                               name="email"
                               placeholder="Email"
                               value="{{ old('email') }}"
                                required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <span class="focus-input"></span>

                        <span class="symbol-input">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input">
                        <input type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input"
                               name="password"
                               placeholder="Password"
                               value="{{ old('password') }}"
                        required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <span class="focus-input"></span>

                        <span class="symbol-input">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>


                    <div class="wrap-input">
                        <input type="password"
                               class="form-control input"
                               name="password_confirmation"
                               id = "password-confirm"
                               placeholder="Confirm Password"
                               required>

                        <span class="focus-input"></span>

                        <span class="symbol-input">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="container-login-form-btn">
                        <button type="submit"  class="login-form-btn">
                            @lang('quickadmin.qa_register')
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="{{route('login')}}">
                            @lang('quickadmin.qa_back_to_login')
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
