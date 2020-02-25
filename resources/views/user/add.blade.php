@extends('layouts.master')



@section('title')
<title>All users</title>
@endsection


@section('content')

<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">
      <a href="{{route('all-user')}}" class="font-josefin">All Users</a>
      <h1 class="font-josefin font-25">All users</h1>
    </div>
  </div>
</div>
<!-- end page title area  -->

<form action="{{route('store-user')}}" method="post" id="user_add_form">
<!-- website info area start  -->
	<div class="row mt-20">
		<div class="col-12 col-lg-6">
		  <div class="card p-3 rounded-0">
			@csrf
			<label for="title" class="mb-2"><b>Name*</b></label>
			<input type="text" class="form-control rounded-0 mb-2" name="name" >

			<label for="email" class="mb-2"><b>Email*</b></label>
			<input type="email" class="form-control rounded-0 mb-2" name="email" >


			<label for="password" class="mb-2"><b>Password*</b></label>
			<input type="password" class="form-control rounded-0 mb-2" name="password" >


			<label for="c_password" class="mb-2"><b>Confirm Password*</b></label>
			<input type="password" class="form-control rounded-0 mb-2" name="c_password" >

			<input type="submit" value="Add" class="btn btn-primary rounded-0">
		  </div>
		</div>



		<div class="col-12 col-lg-6">
		  <div class="card p-3 rounded-0">
			<h3 style="border-bottom: 1px solid rgba(0,0,0,0.125)" class="font-josefin">Permission</h3>
			
			<div class="row mt-3">
				<div class="col-6">
					<h3 class="font-josefin font-25 mt-1">1. Post: </h3>
				</div>
				<div class="col-6">
					<div class="toggleCheck chk3">
					  <input type="checkbox" id="post" name="permission[]" value="post">
					  <label for="post">
					    <div class="toggleCheck_switch" data-checked="Yes" data-unchecked="No"></div>
					  </label>
					</div>
				</div>
			</div>


			<div class="row mt-3">
				<div class="col-6">
					<h3 class="font-josefin font-25 mt-1">2. Category: </h3>
				</div>
				<div class="col-6">
					<div class="toggleCheck chk3">
					  <input type="checkbox" id="category" name="permission[]" value="category">
					  <label for="category">
					    <div class="toggleCheck_switch" data-checked="Yes" data-unchecked="No"></div>
					  </label>
					</div>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-6">
					<h3 class="font-josefin font-25 mt-1">3. Comment: </h3>
				</div>
				<div class="col-6">
					<div class="toggleCheck chk3">
					  <input type="checkbox" id="comment" name="permission[]" value="comment">
					  <label for="comment">
					    <div class="toggleCheck_switch" data-checked="Yes" data-unchecked="No"></div>
					  </label>
					</div>
				</div>
			</div>



			<div class="row mt-3">
				<div class="col-6">
					<h3 class="font-josefin font-25 mt-1">4. Email: </h3>
				</div>
				<div class="col-6">
					<div class="toggleCheck chk3">
					  <input type="checkbox" id="email" name="permission[]" value="email">
					  <label for="email">
					    <div class="toggleCheck_switch" data-checked="Yes" data-unchecked="No"></div>
					  </label>
					</div>
				</div>
			</div>
		  </div>
		</div>
	</div>
 
  </form>
 <!-- website info area end -->
@endsection






