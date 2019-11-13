@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            gghjghjgh
                        @endif
                            <img src="/images/avatars/{{$user->avatar}}" style = "width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"  alt="Oleg Lox">
                                    <h2>{{$user->name}}'s Profile</h2>
                            <form enctype="multipart/form-data" action="/profile" method="POST">
                                <label>Update Profile Image</label>
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class = "pull-right btn btn-sm btn-primary">
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
