@extends('layouts.menu')

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
    </style>

@endsection

@section('content-menu')

    <div class='row'>
        @foreach($menu as $menu_list)

            <div class='col-md-3'>
                <div class="card">
                    <div class="card-header">
                        <div class="card-img"
                             style="background-image:url('{{$menu_list->menu_image}}');"></div>
                    </div>

                    <div class="card-body">
                        <h3>{{$menu_list->menu_name}}</h3>
                        <h4 style="font-size: 90%;">Rp.{{$menu_list->menu_price}}</h4>
                        <p>{{$menu_list->menu_description}}</p>
                        @if(Auth::user()->isAdmin())
                            <p>From: {{$menu_list->cater_name}}</p>
                        @endif
                        <div class='container-fluid'>
                            <a class="btn btn-primary btn-sm"
                               href="/updateMenuForm/{{$menu_list->id}}">Update</a>
                            <a class="btn btn-danger btn-sm" href="/deleteMenu/{{$menu_list->id}}"
                               onclick="return confirm('Do you want to delete this menu?')">Delete</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.card -->
        @endforeach
    </div>


@endsection
