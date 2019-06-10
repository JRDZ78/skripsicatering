@extends('layouts.menu')

@section('content-menu')
<div class="row">
  <div class="col-lg-3">
    <h1 class="my-4">Menu Manager</h1>
    <a type="submit" class="btn btn-primary" href="/addMenuForm">Add New Menu</a>
  </div>

  <div class="col-lg-9">
    <div class='row'>
    @foreach($menu as $menu_list)
        <div class='col-md-4'>
          <div class="card mt-4">
            <div class="card-img-top img-fluid" style="background-image:url('{{$menu_list->menu_image}}');background-repeat: no-repeat;background-size: cover;background-position: center;width: 100%;height: 250px;" alt=""></div>
            <div class="card-body">

              <h3 class="card-title">{{$menu_list->menu_name}}</h3>
              <div class='row'>
              <div class='col-md-6'>
                <h4 style="font-size: 90%;">Rp.{{$menu_list->menu_price}}</h4>
              </div>
              <a type="submit" class="btn btn-primary" href="/updateMenuForm/{{$menu_list->id}}">Update</a>
              <a type="submit" class="btn btn-danger" href="/deleteMenu/{{$menu_list->id}}" onclick="return confirm('Do you want to delete this menu?')">Delete</a>
              </div>

            </div>
          </div>
          </div>
          
          <!-- /.card -->
        @endforeach
          </div>
    

  </div>
</div>


@endsection