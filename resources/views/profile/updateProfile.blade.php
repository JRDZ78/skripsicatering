@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="/updateProfile" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control {{$errors->first('username') != '' ? 'validation-error' : ''}}" id="username" name="username" value="{{old('username',$user->username)}}">
                    <div class="form-control-feedback validation-message-error">{{$errors->first('username')}}</div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="userFirstname">First Name</label>
                            <input type="text"
                                   class="form-control {{$errors->first('userFirstname') != '' ? 'validation-error' : ''}}"
                                   id="userFirstname" name="userFirstname"
                                   value="{{old('userFirstname',$user->firstname)}}">
                            <div
                                class="form-control-feedback validation-message-error">{{$errors->first('userFirstName')}}</div>
                        </div>
                        <div class="col-md-6">
                            <label for="userLastname">Last Name</label>
                            <input type="text"
                                   class="form-control {{$errors->first('userLastname') != '' ? 'validation-error' : ''}}"
                                   id="userLastname" name="userLastname"
                                   value="{{old('userLastname',$user->lastname)}}">
                            <div
                                class="form-control-feedback validation-message-error">{{$errors->first('userLastname')}}</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userEmail">Email</label>
                    <input type="email" class="form-control {{$errors->first('userEmail') != '' ? 'validation-error' : ''}}" id="userEmail" name="userEmail" value="{{old('userEmail',$user->email)}}">
                    <div class="form-control-feedback validation-message-error">{{$errors->first('userEmail')}}</div>
                </div>

                <div class="form-group">
                    <label for="userPhone">Phone</label>
                    <input type="tel" class="form-control {{$errors->first('userPhone') != '' ? 'validation-error' : ''}}" id="userPhone" name="userPhone" value="{{old('userPhone',$user->phone)}}">
                    <div class="form-control-feedback validation-message-error">{{$errors->first('userPhone')}}</div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="avatar">Profile Image</label>
                    <div class="controls">
                        <input type="file" id="avatar" name="avatar" placeholder=""
                               class="form-control {{$errors->first('avatar') != '' ? 'validation-error' : ''}}">
                        <div
                            class=" validation-messages-error">{{$errors->first('avatar')}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userAddress">Address</label>
                    <textarea class="form-control {{$errors->first('userAddress') != '' ? 'validation-error' : ''}}" id="userAddress" name="userAddress">{{old('userAddress',$user->address)}}</textarea>
                    <div class="form-control-feedback validation-message-error">{{$errors->first('userAddress')}}</div>
                </div>
                {{ csrf_field() }}

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
