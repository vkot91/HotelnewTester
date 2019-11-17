

@extends('layouts.login')

@section('content')
    <div class="limiter">

        <div class="container-login">

            <div class="wrap-login">

                <div class="login-pic">
                    <img src='../images/img-01.png' alt="">
                </div>
                <form class="form-horizontal login-form"
                      role="form"
                      method="POST"
                      action="{{ url('password/email') }}">
 <span class="login-form-title">
						Enter your Email
					        </span>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">

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


                    <div class="container-login-form-btn">
                        <button type="submit"  class="login-form-btn">
                            @lang('quickadmin.qa_reset_password')
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="../login">
                            @lang('quickadmin.qa_back_to_login')
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
