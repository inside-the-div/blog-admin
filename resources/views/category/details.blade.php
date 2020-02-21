@extends('layouts.master')



@section('title')
<title>{{$category->name}}</title>
@endsection


@section('content')

<!-- website info area start  -->
 <div class="row">
	<div class="col-12">
		<h3 class="font-25 font-josefin d-inline">Edit Categories</h3>
		<a href="{{route('edit-category', ['id' => $category->id])}}" class="btn_1">Edit this category</a>
	</div>
 </div>

 <div class="row mt-2">
   <div class="col-12 col-lg-8 offset-lg-2">
     <div class="card p-3 rounded-0 table-responsive">
        
        <h1 class="font-josefin font-30 text-capitalize">{{$category->name}}</h1>

        <p class="font-18"><b>Description: </b>{{$category->description}}</p>
        <p class="font-18"><b>SEO tag: </b>{{$category->seo_tag}}</p>
      
     </div>
   </div>
 </div>
 <!-- website info area end -->

@endsection