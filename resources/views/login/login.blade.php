@extends('layouts.app')

@section('content')
    <div class="row" style="width:80%;">
        <div class="col-md-4">
            <form class="form-horizontal" action='{{ route('login') }}' method="post">

                <div>
                    <legend class="">Login To Your Service</legend>
                </div>
                <!-- Login UserName -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder=""
                           class="form-control @if(Session::has('error')) validation-error @endif">
                </div>

                <!-- Login Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder=""
                           class="form-control @if(Session::has('error')) validation-error @endif">
                    <div class="validation-messages-error">
                        @if(Session::has('error')) {{Session::get('error')}} @endif
                    </div>
                </div>




                <!-- Remember Me CheckBox -->
                <div class="checkbox">
                    <label><input type="checkbox" value="1" name="remember"> Remember Me</label>
                </div>


                {{ csrf_field() }}
                <div class="form-group" style="padding-left: 50px">
                    <button type="submit" class="btn btn-success">Log In</button>
                </div>
            </form>
        </div>
    </div>

@endsection
