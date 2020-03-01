<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Nasir">
	
  <!-- Bootstrap core CSS-->

  <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Main styles -->
  <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="{{URL::asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Plugin styles -->
  <link href="{{URL::asset('css/dataTables.bootstrap4.css')}}" rel="stylesheet">
  
  @yield('custom-css')

  <!-- Your custom styles -->
  <link href="{{URL::asset('css/default.css')}}" rel="stylesheet">
  <link href="{{URL::asset('css/custom.css')}}"  rel="stylesheet">
  <!-- start title area -->
  @yield('title')
  <!-- end title area -->

  <meta name="csrf-token" content="{{ csrf_token() }}" />
	
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('home')}}">
      <!-- <img src="img/logo.svg" data-retina="true" alt="" width="142" height="36"> -->
      <h2 class="text-white font-josefin" style="height: 36px">Inside the div</h2>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">


      <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('home')}}">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text font-josefin">Dashboard</span>
        </a>
      </li>
  

    @if(in_array('post',$permission))
      <li class="nav-item dropdown " data-toggle="collapse" data-target="#order-dropdown" aria-expanded="false" aria-controls="order-dropdown">
        <span class="nav-link" >
          <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
          <span class="nav-link-text font-josefin">Posts</span>
        </span>
        <div class="collapse " id="order-dropdown">
          <div class="card card-body bg-dark">
           
              <a class="nav-link" href="{{route('all-post')}}">
               <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
                <span class="nav-link-text font-josefin">All Post</span>
              </a>
              <a class="nav-link" href="{{route('add-post')}}">
                <i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>
                <span class="nav-link-text font-josefin">Add Post</span>
              </a>
          </div>
        </div>
      </li>
      @endif
      

      @if(in_array('category',$permission))
      <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('all-categorys')}}">
          <i class="fa fa-edit fa-fw" aria-hidden="true"></i>
          <span class="nav-link-text font-josefin">Category</span>
        </a>
      </li>
      @endif
      

      @if(in_array('comment',$permission))
      <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{route('all-comments')}}">
          <i class="fa fa-commenting fa-fw" aria-hidden="true"></i>
          <span class="nav-link-text font-josefin">Commests</span>
        </a>
      </li>
      @endif

      @if(in_array('user',$permission))
        <li class="nav-item dropdown"  data-toggle="collapse" data-target="#user-dropdown" aria-expanded="false" aria-controls="user-dropdown">
          <span class="nav-link">
            <i class="fa fa-user-circle fa-fw" aria-hidden="true"></i>
            <span class="nav-link-text font-josefin">Users</span>
          </span>
          <div class="collapse " id="user-dropdown">
            <div class="card card-body bg-dark">
             
                <a class="nav-link" href="{{route('all-user')}}">
                  <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
                  <span class="nav-link-text font-josefin">All User</span>
                </a>
                <a class="nav-link" href="{{route('add-user')}}">
                  <i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>
                  <span class="nav-link-text font-josefin">Add Users</span>
                </a>
            </div>
          </div>
        </li>
        @endif

      @if(in_array('email',$permission))
        <li class="nav-item dropdown"  data-toggle="collapse" data-target="#email-dropdown" aria-expanded="false" aria-controls="email-dropdown">
          <span class="nav-link">
            <i class="fa fa-fw fa-apple"></i>
            <span class="nav-link-text font-josefin">Emails</span>
          </span>
          <div class="collapse " id="email-dropdown">
            <div class="card card-body bg-dark">
             
                <a class="nav-link" href="{{route('all-email')}}">
                  <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
                  <span class="nav-link-text font-josefin">All Email</span>
                </a>
                <a class="nav-link" href="email.html">
                  <i class="fa fa-paper-plane fa-fw" aria-hidden="true"></i>
                  <span class="nav-link-text font-josefin">Send Email</span>
                </a>
            </div>
          </div>
        </li>

        @endif
        


      @if(in_array('other',$permission))
        <li class="nav-item dropdown"  data-toggle="collapse" data-target="#other-dropdown" aria-expanded="false" aria-controls="other-dropdown">
          <span class="nav-link">
            <i class="fa fa-fw fa-puzzle-piece" aria-hidden="true"></i>
            <span class="nav-link-text font-josefin">Other</span>
          </span>
          <div class="collapse " id="other-dropdown">
            <div class="card card-body bg-dark">
             
                <a class="nav-link" href="{{route('about')}}">
                  <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
                  <span class="nav-link-text font-josefin">About Me</span>
                </a>
                <a class="nav-link" href="{{route('privacy')}}">
                  <i class="fa fa-list-ul fa-fw" aria-hidden="true"></i>
                  <span class="nav-link-text font-josefin">Privacy policy</span>
                </a>
            </div>
          </div>
        </li>

        @endif

        
        @if(in_array('settings',$permission))
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('settings')}}">
            <i class="fa fa-cog fa-fw" aria-hidden="true"></i>
            <span class="nav-link-text font-josefin">Settings</span>
          </a>
        </li>
        @endif

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class=" dropdown ">
          <a class="nav-link dropdown-toggle" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i>
          </a>
          <div class="dropdown-menu " aria-labelledby="alertsDropdown" style="right: 0% !important; left:initial;">
            <a class="dropdown-item nav-item " href="{{route('my-profile')}}"><i class="fa fa-fw fa-user"></i>Profile</a>
            <a class="dropdown-item nav-item " href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /Navigation-->

  <div class="content-wrapper">
    <div class="container-fluid">
      

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{$error}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endforeach
    @endif


    @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif


    @if (Session::has('access'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{Session::get('access')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif



		  <!-- start main content area  -->
      @yield('content')
      <!-- end main content area -->
        
	  </div>
	  <!-- /.container-fluid-->
  </div>
    <!-- /.container-wrapper-->



    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Ai-tipu 2020</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>


        <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ URL::asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('js/admin-datatables.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('js/admin.js') }}"></script>
    <script src="{{ URL::asset('js/function.js') }}"></script>

    @yield('custom-script')
    </body>
</html>


