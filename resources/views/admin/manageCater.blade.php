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
            height: 7em;
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
        @foreach($cater as $cater_list)

            <div class='col-md-4'>
                <div class="card">
                    <div class="card-header">
                        <div class="card-img"
                             style="background-image:url('{{$cater_list->banner}}');"></div>
                    </div>

                    <div class="card-body">
                        <h3>{{$cater_list->name}}</h3>
                        <h4 style="font-size: 90%;">Owned By {{$cater_list->firstname}} {{$cater_list->lastname}}</h4>
                        <p>{{$cater_list->description}}</p>
                        <div class='container-fluid'>
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
