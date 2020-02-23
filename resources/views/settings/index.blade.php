@extends('layouts.master')

@section('title')
	<title>Settings</title>
@endsection


@section('content')

	<!-- page title area  -->
	<div class="row">
	  <div class="col-12">
	    <div class="page-title-area">
	      <h1 class="font-josefin font-25">Settings</h1>
	    </div>
	  </div>
	</div>
	<!-- end page title area  -->

	<div class="row mt-2">
	  <div class="col-12 col-lg-10 offset-lg-1">
	  	<form action="{{route('update-settings')}}" method="post">
		    <div class="card rounded-0 p-3">
				@csrf
		        <label for="title"><b>Title*</b></label>

		        <input type="text" name="title" id="title" class="form-control rounded-0" value="{{$settings->title}}">

		        <label for="description" class="mt-2"><b>Description*</b></label>
		        <textarea class="form-control rounded-0"  id="description" name="description"  rows="5">{{$settings->description}}</textarea>

		        <label for="tag" class="mt-2"><b>Tag*</b></label>
		        <textarea class="form-control rounded-0"  id="tag" name="tag" rows="5">{{$settings->tag}}</textarea>

		        <label for="heading" class="mt-2"><b>Heading*</b></label>
		        <textarea class="form-control rounded-0"  id="heading" name="heading" rows="4">{{$settings->heading}}</textarea>

				<label for="facebook" class="mt-2"><b>Facebook*</b></label>
				<input type="text" name="facebook" id="facebook" class="form-control rounded-0" value="{{$settings->facebook}}">

				<label for="youtube" class="mt-2"><b>Youtube*</b></label>
				<input type="text" name="youtube" id="youtube" class="form-control rounded-0" value="{{$settings->youtube}}">

				<label for="linkedin" class="mt-2"><b>Linkedin*</b></label>
				<input type="text" name="linkedin" id="linkedin" class="form-control rounded-0" value="{{$settings->linkedin}}">

				<label for="codepen" class="mt-2"><b>Codepen*</b></label>
				<input type="text" name="codepen" id="codepen" class="form-control rounded-0" value="{{$settings->codepen}}">

				<label for="github" class="mt-2"><b>Github*</b></label>
				<input type="text" name="github" id="github" class="form-control rounded-0" value="{{$settings->github}}">

				<label for="email" class="mt-2"><b>Email*</b></label>
				<input type="email" name="email" id="email" class="form-control rounded-0" value="{{$settings->email}}">


				<label for="copyright" class="mt-2"><b>Copyright*</b></label>
				<input type="text" name="copyright" id="copyright" class="form-control rounded-0" value="{{$settings->copyright}}">


				
				<input type="submit" class="btn_1 mt-2" value="Update">
		       	
		      	
		    </div>
	    </form>
	  </div>
	</div>

@endsection
