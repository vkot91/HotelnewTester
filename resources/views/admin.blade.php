@extends('layouts.app2')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcom to the Admin panel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



        <a href="adminrooms">rooms</a>
        <a href="adminparks">parking</a>
        <a href="adminusers">users</a>
            <a href="adminhistory">history</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
