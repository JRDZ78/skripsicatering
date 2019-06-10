@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-lg-3">
    <h1 class="my-4">Food Type</h1>
    <div class="list-group">
        <a href="/" class="list-group-item">All</a>
      @foreach($menu_type as $menu_type_list)
                    <a href="/?menu_type={{$menu_type_list->id}}" class="list-group-item">{{$menu_type_list->menu_type_name}}</a>
      @endforeach
    </div>
  </div>

  <div class="col-lg-9">
    @yield('content-menu')

  </div>
</div>

@endsection
