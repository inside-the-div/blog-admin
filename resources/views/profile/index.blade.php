@extends('layouts.master')

@section('title')
	<title>{{$user->name}}</title>
@endsection


@section('content')

	<!-- page title area  -->
	<div class="row">
	  <div class="col-12">
	    <div class="page-title-area">
	      <h1 class="font-josefin font-25">My Profile</h1>
	    </div>
	  </div>
	</div>
	<!-- end page title area  -->

	<div class="row mt-2">
	  <div class="col-12 col-lg-6">
	  	<form action="{{route('update-profile')}}" method="post">
		    <div class="card rounded-0 p-3">
		    	<h3 class="text-center font-josefin font-25">Update Your Profile</h3>
		    	<hr>
				@csrf
		        <label for="name"><b>Name</b></label>

		        <input type="text" name="name" id="name" class="form-control rounded-0" value="{{$user->name}}">

		        <label for="about" class="mt-2"><b>About</b></label>
		        <textarea class="form-control rounded-0"   name="about"  rows="5">{{$user->about}}</textarea>

		        <label for="address" class="mt-2"><b>Address</b></label>
		        <textarea class="form-control rounded-0"  id="address" name="address" rows="5">{{$user->address}}</textarea>

				<label for="phone" class="mt-2"><b>Phone</b></label>
				<input type="text" name="phone" id="phone" class="form-control rounded-0" value="{{$user->phone}}">
				<input type="submit" class="btn_1 mt-2" value="Update">
		    </div>
	    </form>
	  </div>



	    <div class="col-12 col-lg-6">

	    	<form action="{{route('change-password')}}" method="post">
	  	    <div class="card rounded-0 p-3">
	  	    	<h3 class="text-center font-josefin font-25">Change Password</h3>
	  	    	<hr>
	  			@csrf
	  	        <label class="font-josefin font-16" for="old_password"><b>Old Password*</b></label>
	  	        <input type="password" name="old_password" id="old_password" class="form-control rounded-0">

	  	        <label class="font-josefin font-16 mt-4" for="new_password"><b>New Password*</b></label>
	  	        <input type="password" name="new_password" id="new_password" class="form-control rounded-0">

	  	        <label class="font-josefin font-16 mt-4" for="c_new_password"><b>Confirm New Password*</b></label>
	  	        <input type="password" name="c_new_password" id="c_new_password" class="form-control rounded-0">

				<span class="text-danger font-pt mt-2 font-16"><b>Note: </b>minimum 8 character password.</span>
	  			<input type="submit" class="btn_1 mt-2" value="Update">
	  	    </div>
	      </form>


	    </div>
	</div>

@endsection
