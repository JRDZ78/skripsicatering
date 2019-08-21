@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <img src={{$user->avatar}} style="width:300px;height:300px;">
            </div>
        </div>

        <div class="col-md-6">
            <form action="/register" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username : </label>{{$user->username}}
                </div>
                <div class="form-group">
                    <label for="userFirstname">First Name : </label>{{$user->firstname}}
                </div>
                <div class="form-group">
                    <label for="userLastname">Last Name : </label>{{$user->lastname}}
                </div>
                <div class="form-group">
                    <label for="email">Email : </label>{{$user->email}}
                </div>
                <div class="form-group">
                    <label for="date_of_birth">Date Of Birth : </label>{{$user->date_of_birth}}
                </div>
                <div class="form-group">
                    <label for="phone">Phone : </label>{{$user->phone}}
                </div>
                <div class="form-group">
                    <label for="address">Address : </label>{{$user->address}}
                </div>
                {{ csrf_field() }}
                <a class="btn btn-primary" href="/updateProfileForm">Update Profile</a>
                <a class="btn btn-danger" href="/changePasswordForm">Change Password</a>
            </form>
        </div>
    </div>
@endsection
