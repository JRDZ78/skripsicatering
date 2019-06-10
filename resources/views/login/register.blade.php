@extends('layouts.app')

@section('content')
<form class="form-horizontal" action='/register' method="post" enctype="multipart/form-data">
	<div class="row" style="width: 80%;">
		<div class="col-md-6">
			<div class="container" style="padding-left:50px;">
				<fieldset>
				    <div id="legend">
				      <legend class="">Register Your Identity</legend>
				    </div>

				    <!-- UserName -->
				    <div class="form-group">
				      <label class="control-label"  for="username">Username</label>
				      <div class="controls">
				        <input type="text" id="username" name="username" placeholder="" class="form-control {{$errors->first('username') != '' ? 'validation-error' : ''}}" value="{{old('username')}}">
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('username')}}</div>
				        <!-- <p class="help-block">Username can contain any letters or numbers, without spaces</p> -->
				      </div>
				    </div>

					<!-- First Name & Last Name -->
				    <div class="form-group" style="">
					    <div class="row">
						    <div class="col-md-6">
						      <label class="control-label"  for="userFirstname">First Name</label>
						      <div class="controls">
						        <input type="text" id="userFirstname" name="userFirstname" placeholder="" class="form-control {{$errors->first('userFirstname') != '' ? 'validation-error' : ''}}" value="{{old('userFirstname')}}">
						        <div class="form-control-feedback validation-messages-error">{{$errors->first('userFirstname')}}</div>
						      </div>
						    </div>
						    <div class="col-md-6">
					      	  <label class="control-label"  for="userLastname">Last Name</label>
					      	  <div class="controls">
						        <input type="text" id="userLastname" name="userLastname" placeholder="" class="form-control {{$errors->first('userLastname') != '' ? 'validation-error' : ''}}" value="{{old('userLastname')}}">
						        <div class="form-control-feedback validation-messages-error">{{$errors->first('userLastname')}}</div>			        
					      	  </div>
					      	</div>
				      	</div>
				      	<!-- <p class="help-block">First and Last Names can only contain letters</p> -->
				    </div>
			 	
				 	<!-- Email -->
				    <div class="form-group">
				      <label class="control-label" for="userEmail">E-mail</label>
				      <div class="controls">
				        <input type="text" id="userEmail" name="userEmail" placeholder="" class="form-control {{$errors->first('userEmail') != '' ? 'validation-error' : ''}}" value="{{old('userEmail')}}">
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('userEmail')}}</div>
				      </div>
				    </div>
			 
				 	<!-- Password -->
				    <div class="form-group">
				      <label class="control-label" for="userPassword">Password</label>
				      <div class="controls">
				        <input type="password" id="userPassword" name="userPassword" placeholder="" class="form-control {{$errors->first('userPassword') != '' ? 'validation-error' : ''}}">
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('userPassword')}}</div>
				      </div>
				    </div>
			 
				    <!-- Confirm Password -->
				    <div class="form-group">
				      <label class="control-label"  for="userPassword_confirmation">Password (Confirm)</label>
				      <div class="controls">
				        <input type="password" id="userPassword_confirmation" name="userPassword_confirmation" placeholder="" class="form-control {{$errors->first('userPassword_confirmation') != '' ? 'validation-error' : ''}}">
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('userPassword_confirmation')}}</div>
				      </div>
				    </div>

				    <!-- Phone Number -->
				    <div class="form-group">
				      <label class="control-label"  for="userPhone">Phone Number</label>
				      <div class="controls">
				        <input type="tel" id="userPhone" name="userPhone" placeholder="" class="form-control {{$errors->first('userPhone') != '' ? 'validation-error' : ''}}" value="{{old('userPhone')}}">
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('userPhone')}}</div>
				      </div>
				    </div>

			    	<!-- Address -->
				    <div class="form-group">
				      <label class="control-label"  for="userAddress">Address</label>
				      <div class="controls">
				        <textarea type="text" id="userAddress" name="userAddress" placeholder="" class="form-control {{$errors->first('userAddress') != '' ? 'validation-error' : ''}}" >{{old('userAddress')}}</textarea>
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('userAddress')}}</div>
				      </div>
				    </div>	 
			    </fieldset>
			</div>
		</div>

		<div class="col-md-6">
			<div class="container">
			 	<fieldset>
			    <div id="legend">
			      <legend class="">Register Your Catering Service</legend>
			    </div>

				    <!-- Catering Service Name -->
				    <div class="form-group">
				      <label class="control-label"  for="caterserviceName">Catering Service Name</label>
				      <div class="controls">
				        <input type="text" id="caterserviceName" name="caterserviceName" placeholder="" class="form-control {{$errors->first('caterserviceName') != '' ? 'validation-error' : ''}}" value="{{old('caterserviceName')}}">
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('caterserviceName')}}</div>
				      </div>
				    </div>
				
				    <!-- Logo Image -->
				    <div class="form-group">
				      <label class="control-label"  for="caterserviceLogo">Logo</label>
				      <div class="controls">
				        <input type="file" id="caterserviceLogo" name="caterserviceLogo" placeholder="" class="form-control {{$errors->first('caterserviceLogo') != '' ? 'validation-error' : ''}}">
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('caterserviceLogo')}}</div>
				      </div>
				    </div>
			 	
				 	<!-- Phone Number -->
				    <div class="form-group">
				      <label class="control-label"  for="caterservicePhone">Phone Number</label>
				      <div class="controls">
				        <input type="tel" id="caterservicePhone" name="caterservicePhone" placeholder="" class="form-control {{$errors->first('caterservicePhone') != '' ? 'validation-error' : ''}} " value="{{old('caterservicePhone')}}">
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('caterservicePhone')}}</div>
				      </div>
				    </div>

				    <!-- Address -->
				    <div class="form-group">
				      <label class="control-label"  for="caterserviceAddress">Catering Address</label>
				      <div class="controls">
				        <textarea type="text" id="caterserviceAddress" name="caterserviceAddress" placeholder="" class="form-control {{$errors->first('caterserviceAddress') != '' ? 'validation-error' : ''}}" >{{old('caterserviceAddress')}}</textarea>
				        <div class="form-control-feedback validation-messages-error">{{$errors->first('caterserviceAddress')}}</div>
				      </div>
				    </div>			 
			    </fieldset>
			</div>
		</div>
		{{ csrf_field() }}
		<div class="form-group" style="padding-left: 50px">
	      	<div class="controls">
	        	<button type="submit" class="btn btn-success">Register</button>
	      	</div>
	    </div>	    
	</div>
</form>
@endsection