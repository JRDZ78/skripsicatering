@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="/addMenu" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="menu_name">Menu Name:</label>
                    <input type="menu_name"
                           class="form-control {{$errors->first('menu_name') != '' ? 'validation-error' : ''}}"
                           id="menu_name" name="menu_name">
                    <div class=" validation-messages-error">{{$errors->first('menu_name')}}</div>
                </div>
                <div class="form-group">
                    <label for="menu_image">Image:</label>
                    <input type="file"
                           class="form-control {{$errors->first('menu_image') != '' ? 'validation-error' : ''}}"
                           id="menu_image" name="menu_image">
                    <div class=" validation-messages-error">{{$errors->first('menu_image')}}</div>
                </div>
                <div class="form-group">
                    <label for="menu_description">Description:</label>
                    <textarea type="text"
                              class="form-control {{$errors->first('menu_description') != '' ? 'validation-error' : ''}}"
                              id="menu_description" name="menu_description"></textarea>
                    <div
                        class=" validation-messages-error">{{$errors->first('menu_description')}}</div>
                </div>
                <div class="form-group">
                    <label for="menu_price">Menu Price:</label>
                    <input type="menu_price"
                           class="form-control {{$errors->first('menu_price') != '' ? 'validation-error' : ''}}"
                           id="menu_price" name="menu_price">
                    <div class=" validation-messages-error">{{$errors->first('menu_price')}}</div>
                </div>
                <div class="form-group">
                    <label for="menu_type_id">Menu Type:</label>
                    <select class="form-control {{$errors->first('menu_type_id') != '' ? 'validation-error' : ''}}"
                            id="menu_type_id" name="menu_type_id">
                        @foreach($menu_type as $menu_type_list)
                            <option value="{{$menu_type_list->id}}">{{$menu_type_list->menu_type_name}}</option>
                        @endforeach
                    </select>
                    <div
                        class=" validation-messages-error">{{$errors->first('menu_type_id')}}</div>
                </div>
                <div class="form-group">
                    <label for="weekday">Day Availability:</label>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          class="{{$errors->first('weekday') != '' ? 'validation-error' : ''}}"
                                                          id="weekday" name="weekday[]" value="1">Monday</label>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          class="{{$errors->first('weekday') != '' ? 'validation-error' : ''}}"
                                                          id="weekday" name="weekday[]" value="2">Tuesday</label>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          class="{{$errors->first('weekday') != '' ? 'validation-error' : ''}}"
                                                          id="weekday" name="weekday[]" value="3">Wenesday</label>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          class="{{$errors->first('weekday') != '' ? 'validation-error' : ''}}"
                                                          id="weekday" name="weekday[]" value="4">Thursday</label>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          class="{{$errors->first('weekday') != '' ? 'validation-error' : ''}}"
                                                          id="weekday" name="weekday[]" value="5">Friday</label>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          class="{{$errors->first('weekday') != '' ? 'validation-error' : ''}}"
                                                          id="weekday" name="weekday[]" value="6">Saturday</label>
                    <label class="checkbox-inline"><input type="checkbox"
                                                          class="{{$errors->first('weekday') != '' ? 'validation-error' : ''}}"
                                                          id="weekday" name="weekday[]" value="0">Sunday</label>
                    <div class=" validation-messages-error">{{$errors->first('weekday')}}</div>
                </div>

                {{ csrf_field() }}

                <button type="submit" class="btn btn-primary">Add Menu</button>
            </form>
        </div>
    </div>

@endsection
