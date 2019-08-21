@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="/changePassword" method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label class="control-label" for="password_old">Old Password</label>
                        <input type="password" id="password_old" name="password_old" placeholder=""
                               class="form-control {{$errors->first('password_old') != '' ? 'validation-error' : ''}}">
                        <div
                            class=" validation-messages-error">{{$errors->first('password')}}</div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="password">New Password</label>
                        <input type="password" id="password" name="password" placeholder=""
                               class="form-control {{$errors->first('password') != '' ? 'validation-error' : ''}}">
                        <div
                            class=" validation-messages-error">{{$errors->first('password')}}</div>
                    </div>


                    <div class="form-group">
                        <label class="control-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               placeholder=""
                               class="form-control {{$errors->first('password_confirmation') != '' ? 'validation-error' : ''}}">
                        <div
                            class=" validation-messages-error">{{$errors->first('password_confirmation')}}</div>
                    </div>


                {{ csrf_field() }}

                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>

@endsection
