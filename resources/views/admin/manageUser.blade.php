@extends('layouts.app')

@section('style')
    <style>
        .card {
            border: thin solid black;
        }

        .card .card-img {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 13em;
        }

        .card .card-body {
            padding: 1em;
        }

        .card .card-body h3 {
            margin: 0;
        }
        .col-md-2 {
            padding-bottom:15px;
        }
    </style>

@endsection

@section('content')
    <div class='row'>
        @foreach($user as $user_list)

            <div class='col-md-2'>
                <div class="card">
                    <div class="card-header">
                        <div class="card-img"
                             style="background-image:url('{{$user_list->avatar}}');"></div>
                    </div>

                    <div class="card-body">
                        <h3>{{$user_list->username}}</h3>
                        <h4 style="font-size: 90%;">
                            @if($user_list->role_id == 2)
                                Owner
                            @elseif($user_list->role_id == 3)
                                Customer
                            @endif
                        </h4>
                        <div class='container-fluid' style="padding: 0">
                            <a class="btn btn-primary btn-sm"href="#">Update</a>
                            <a class="btn btn-danger btn-sm" href="#">Delete</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.card -->
        @endforeach
    </div>

@endsection
