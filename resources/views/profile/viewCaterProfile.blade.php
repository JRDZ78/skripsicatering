@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <img src={{$cater->banner}}>
            </div>
        </div>

        <div class="col-md-6">
            <form action="/register" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Cater Service : </label>{{$cater->name}}
                </div>
                <div class="form-group">
                    <label for="description">Description : </label>{{$cater->description}}
                </div>
                <div class="form-group">
                    <label for="phone">Phone : </label>{{$cater->phone}}
                </div>
                <div class="form-group">
                    <label for="address">Address : </label>{{$cater->address}}
                </div>
                {{ csrf_field() }}
                <a type="submit" class="btn btn-primary" href="/updateCaterProfileForm">Update Cater Profile</a>
            </form>
        </div>
    </div>
@endsection
