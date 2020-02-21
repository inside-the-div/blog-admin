@extends('layouts.master')



@section('title')
<title>Dashboard</title>
@endsection


@section('content')

<!-- page title area  -->
<div class="row">
  <div class="col-12">
    <div class="page-title-area">
      <a href="{{route('add-post')}}" class="font-josefin">Add new Post</a>
      <h1 class="font-josefin font-25">All Posts</h1>
      <div class="alert alert-info alert-dismissible fade show rounded-0" role="alert">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- end page title area  -->


<!-- website info area start  -->
 <div class="row mt-20">

   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>

   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total projects</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>


   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total HTML,CSS posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>

   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total Bootstrap posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>

   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total javascript posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>


   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total Jquery posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>

   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total Vue.js posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>

   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total MYSQL posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>

   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total PHP posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>


   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total Laravel posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>


   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total REST API posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>



   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total Algorithm posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>


   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total Data structure posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>


   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total ACM Problem Solve</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>


   <div class="col-12 col-lg-3 mb-4">
     <a href="" data-toggle="tooltip" title="Click, For Details" data-placement="right">
       <div class="card p-1 text-center">
         <h4 class="font-josefin font-20">Total other posts</h4>
         <span class="font-pt font-30">120</span>
       </div>
     </a>
   </div>
 </div>
 <!-- website info area end -->
@endsection