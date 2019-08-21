@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-3">
            @if(Auth::user()->isAdmin())
                <h1>Find Menu by Cater</h1>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">All
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </ul>
                </div>
            @endif
            <h1>Food Type</h1>
            <div class="list-group">
                <a href="/homepage" class="list-group-item">All</a>
                @foreach($menu_type as $menu_type_list)
                    <a href="/homepage?menu_type={{$menu_type_list->id}}"
                       class="list-group-item">{{$menu_type_list->menu_type_name}}</a>
                @endforeach
            </div>
            @if(!Auth::user()->isAdmin())
                <a class="btn btn-primary" href="/addMenuForm">Add New Menu</a>
            @endif
        </div>

        <div class="col-lg-9">
            <div class="container-fluid">
                @yield('content-menu')
            </div>
        </div>
    </div>

@endsection
