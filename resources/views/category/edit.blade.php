@extends('layouts.master')



@section('title')
<title>{{$category->name}}</title>
@endsection


@section('content')

<!-- website info area start  -->
 <div class="row">
	<div class="col-12">
		<h3 class="font-25 font-josefin d-inline">Edit Categories</h3>
		<a href="{{route('all-categorys')}}"  class="btn_1" >Add new category</a>
	</div>
 </div>

 <div class="row mt-2">
   <div class="col-12 col-lg-8 offset-lg-2">
     <div class="card p-3 rounded-0 table-responsive">
        
        <form action="{{route('update-category')}}" method="post">
          @csrf
          
            <label for=""><b>Name*</b></label>
            <input type="text" class="form-control rounded-0 mb-2" name="name" value="{{$category->name}}">

            <label for=""><b>Description*</b></label>
            <textarea name="description" id="" cols="30" rows="5" class="form-control rounded-0 mb-2">{{$category->description}}</textarea>

            <label for=""><b>Tag*</b></label>
            <textarea name="tag" id="" cols="30" rows="5" class="form-control rounded-0 mb-2">{{$category->seo_tag}}</textarea>
         
            <input type="hidden" value="{{$category->id}}" name="id">
          
            <input type="submit" class="btn_1 font-18  font-pt" value="Update" name="submit">
         

        </form>
      
     </div>
   </div>
 </div>
 <!-- website info area end -->





@endsection