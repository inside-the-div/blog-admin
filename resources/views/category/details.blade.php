@extends('layouts.master')



@section('title')
<title>{{$category->name}}</title>
@endsection


@section('content')

<!-- website info area start  -->
 <div class="row">
	<div class="col-12">
		<h3 class="font-25 font-josefin d-inline text-capitalize">{{$category->name}}</h3>
    @if(!in_array($category->name,$not_edit_delete))
		<a href="{{route('edit-category', ['id' => $category->id])}}" class="btn_1">Edit this category</a>
    @endif
	</div>
 </div>

 <div class="row mt-2">
   <div class="col-12 col-lg-8 offset-lg-2">
     <div class="card p-3 rounded-0 table-responsive">
        <h1 class="font-josefin font-30 text-capitalize">{{$category->name}}</h1>
        <p class="font-18 font-pt mt-2"><b>Description: </b>{{$category->description}}</p>
        <p class="font-18 font-pt mt-2"><b>SEO tag: </b>{{$category->seo_tag}}</p>
     </div>
   </div>   
    <div class="col-12 col-lg-8 offset-lg-2 mt-3">
      <h3 class="font-josefin font-25">Number of post under this category is: <b class="btn_1 font-pt">{{count($category->posts)}}</b></h3>
    </div>
    <?php $i =0;?>
    @foreach($posts as $post)
      <?php $i++;?>
     <div class="col-12 col-lg-8 offset-lg-2 mt-2">
       <div class="card p-3 rounded-0 table-responsive">
          <h1 class="font-josefin font-18 text-capitalize">{{$i}}. <a href="{{route('show-post',['id' => $post->id])}}">{{$post->name}}</a></h1>
       </div>
     </div>
   @endforeach
      <div class="col-12 col-lg-8 mt-2 offset-lg-2">
        <div class="text-right" style="float: right;">
          {{ $posts->links() }}
        </div>
      </div>
 </div>
 <!-- website info area end -->

@endsection