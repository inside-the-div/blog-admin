@extends('layouts.master')



@section('title')
<title>{{$user->name}}</title>
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

<form action="{{route('update-user')}}" method="post" id="user_add_form">
	@csrf
<!-- website info area start  -->
	<div class="row mt-20">
		
		<input type="hidden" value="{{$user->id}}" name="user_id">

		<div class="col-12 col-lg-6">
		  <div class="card p-3 rounded-0">
			<h3 style="border-bottom: 1px solid rgba(0,0,0,0.125)" class="font-josefin">Permission</h3>
			


			@php 
				$par_array = ['post','category','email','comment'];
			@endphp

			@for($i = 0; $i<4; $i++)

				@if(in_array($par_array[$i], $psermissionArray))
					<div class="row mt-3">
						<div class="col-6">
							<h3 class="font-josefin font-25 mt-1 text-capitalize">{{$i+1}} .{{$par_array[$i]}}</h3>
						</div>
						<div class="col-6">
							<div class="toggleCheck chk3">
							  <input type="checkbox" id="{{$par_array[$i]}}" name="permission[]" value="{{$par_array[$i]}}" checked>
							  <label for="{{$par_array[$i]}}">
							    <div class="toggleCheck_switch" data-checked="Yes" data-unchecked="No"></div>
							  </label>
							</div>
						</div>
					</div>
				@else
					<div class="row mt-3">
						<div class="col-6">
							<h3 class="font-josefin font-25 mt-1 text-capitalize">{{$i+1}} .{{$par_array[$i]}}</h3>
						</div>
						<div class="col-6">
							<div class="toggleCheck chk3">
							  <input type="checkbox" id="{{$par_array[$i]}}" name="permission[]" value="{{$par_array[$i]}}" >
							  <label for="{{$par_array[$i]}}">
							    <div class="toggleCheck_switch" data-checked="Yes" data-unchecked="No"></div>
							  </label>
							</div>
						</div>
					</div>
				@endif
			@endfor

			<input type="submit" value="Update" class="btn btn-primary rounded-0 mt-3">
		  </div>
		</div>
	</div>
 
  </form>
 <!-- website info area end -->
@endsection






