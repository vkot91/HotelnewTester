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
                    @endif


{{--                        @foreach ($users as $user)--}}
                            <img src="/images/avatars/{{$user->avatar}}" style = "width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"  alt="Oleg Lox">
                            <h2>{{$user->name}}'s Profile</h2>
                        <h2>{{$user->email}}</h2>
{{--                            @endforeach--}}
                        <a href="profile">Go to Change</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
