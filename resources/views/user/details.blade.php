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

    </div>
  </div>
</div>
<!-- end page title area  -->


<!-- website info area start  -->
	<div class="row mt-20">
		
		

		<div class="col-12 col-lg-6 offset-lg-3">
		  <div class="card p-3 rounded-0">
		  	<h1 class="font-josefin font-25">Name: {{$user->name}}</h1>
		  	<h1 class="font-josefin font-25 mb-3">Email: {{$user->email}}</h1>
			<h3 style="border-bottom: 1px solid rgba(0,0,0,0.125)" class="font-josefin">Permission</h3>
			
			@foreach($psermissionArray as $p)
				<div class="row mt-3">
					<div class="col-6">
						<h3 class="font-josefin font-25 mt-1 text-capitalize">{{$p}}</h3>
					</div>
					<div class="col-6">
						<div class="toggleCheck chk3">
						  <input type="checkbox" id="{{$p}}" name="permission[]" value="{{$p}}" checked>
						  <label for="{{$p}}">
						    <div class="toggleCheck_switch" data-checked="Yes" data-unchecked="No"></div>
						  </label>
						</div>
					</div>
				</div>
			@endforeach

		  </div>
		</div>
	</div>
 <!-- website info area end -->
@endsection






