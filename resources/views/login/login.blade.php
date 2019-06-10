@extends('layouts.app')

@section('content')
	<div class="row" style="width:80%;">
		<div class="col-md-12">
			<form class="form-horizontal" action='/login' method="post">
			  <fieldset>
			    <div id="legend">
			      <legend class="">Login To Your Service</legend>
			    </div>
			    <!-- Login UserName -->
			    <div class="form-group">
			      <label class="control-label"  for="username">Username</label>
			      <div class="controls">
			        <input type="text" id="username" name="username" placeholder="" class="input-xlarge @if(Session::has('error')) validation-error @endif">
			        <div class="form-control-feedback validation-messages-error">@if(Session::has('error')) @endif</div>
			  	  </div>
			    </div>
			 
			 	<!-- Login Password -->
			    <div class="form-group">
			      <label class="control-label" for="password">Password</label>
			      <div class="controls">
			        <input type="password" id="password" name="password" placeholder="" class="input-xlarge @if(Session::has('error')) validation-error @endif">
			        <div class="form-control-feedback validation-messages-error">@if(Session::has('error')) {{Session::get('error')}} @endif</div>
			  </div>
			      </div>


			    <!-- Remember Me CheckBox -->
			    <div class="checkbox">
					<label><input type="checkbox" value="1" name="remember"> Remember Me</label>
			  	</div>

			  	{{ csrf_field() }}
				<div class="form-group" style="padding-left: 50px">
			      <div class="controls">
			        <button type="submit" class="btn btn-success">Log In</button>
			      </div>
			    </div>		 			 
			    
			  </fieldset>
			</form>		
		</div>
	</div>

@endsection