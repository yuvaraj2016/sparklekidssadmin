@extends('layouts.app')

@section('head')
  <!-- Scripts -->


  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">

  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

 <!-- General CSS Files -->
 {{-- <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css"> --}}
 <link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css') }}">
 <link rel="stylesheet" href="{{ asset('modules/jquery-selectric/selectric.css') }}">
 <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css') }}">

 <link rel="stylesheet" href="{{ asset('modules/bootstrap-daterangepicker/daterangepicker.css')}}">

 <link rel="stylesheet" href="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

 <!-- CSS Libraries -->

 <!-- Template CSS -->
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 <link rel="stylesheet" href="{{ asset('css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>
@endsection

@section('nav')

<nav class="navbar navbar-expand-md bg-dark navbar-dark ml-auto">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav" style="height:auto!important;">
      <li class="dropdown"><a href="{{ route('albums')}}" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            Gallery </a>
            <div class="dropdown-menu dropdown-menu-right submenu" style="height:auto; left:0px!important;">
              {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
              <a href="{{ route('albums')}}" class="dropdown-item has-icon">
                <i class="fas fa-images"></i> Albums
              </a>
              {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon"> --}}
                {{-- <i class="fas fa-cog"></i> Settings
              </a> --}}
              <div class="dropdown-divider"></div>
              <a href="{{ route('photos')}}" class="dropdown-item has-icon">
                <i class="fas fa-image"></i> Photos
              </a>


            </div>
          </li>
          {{-- <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            <div class="d-sm-none d-lg-inline-block">Testimonial</div></a>
            <div class="dropdown-menu dropdown-menu-right" style="height:auto;">

            </div>
          </li> --}}
         <li class="dropdown">
         <a class="nav-link nav-link-lg nav-link-user" href="{{ route('testimonials')}}">Testimonial</a>
         </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            {{ Auth::user()->name }}</a>
            <div class="dropdown-menu dropdown-menu-right submenu" style="height:auto;">
              {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon"> --}}
                {{-- <i class="fas fa-cog"></i> Settings
              </a> --}}
              <div class="dropdown-divider"></div>
              <a class="dropdown-item has-icon" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                     <i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
          </li>
      </ul>
    </div>
  </nav>
  @endsection

@section('content')

<section class="section" style="margin-top:-70px;">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('testimonials') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i>&nbsp;<b>Back</b></a>
      </div>
      <h1>View Testimonial</h1>
      <div class="section-header-breadcrumb">
        {{-- <div class="breadcrumb-item active"><a href="{{ route('albums') }}">Gallery</a></div> --}}
        <div class="breadcrumb-item"><a href="{{ route('testimonials') }}">Testimonials</a></div>
        <div class="breadcrumb-item">View Testimonial</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name : </label>
                    <div class="col-sm-12 col-md-7 p-2">
                        Anandh Raj
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title : </label>
                    <div class="col-sm-12 col-md-7 p-2">
                        About School
                    </div>
                  </div>

               <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image : </label>
                    <div class="col-sm-12 col-md-7 p-2">

                        <img src="{{ asset('img/avatar/avatar-5.png')}}"/>

                    </div>
                  </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description : </label>
                    <div class="col-sm-12 col-md-7 p-2">
                        Sparkle Kidss is one of the best.
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
                    <div class="col-sm-12 col-md-7 p-2">
                        2018-01-20
                    </div>
                  </div>

              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Privacy</label>
                <div class="col-sm-12 col-md-7 p-2">
                    Public
                </div>
              </div>
              {{-- <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control inputtags">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric">
                    <option>Publish</option>
                    <option>Draft</option>
                    <option>Pending</option>
                  </select>
                </div>
              </div>--}}

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('foot')
<!-- General JS Scripts -->
<script src="{{ asset('modules/jquery.min.js')}}"></script>
<script src="{{ asset('modules/popper.js')}}"></script>
<script src="{{ asset('modules/tooltip.js')}}"></script>
<script src="{{ asset('modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{ asset('modules/moment.min.js')}}"></script>
<script src="{{ asset('js/stisla.js')}}"></script>
<script src="{{ asset('modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('js/scripts.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>

<script src="{{ asset('modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{ asset('modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
  <script src="{{ asset('modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>
  <script src="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('js/page/features-post-create.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('js/scripts.js')}}"></script>
  <script src="{{ asset('js/custom.js')}}"></script>
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
@endsection
<style>
    @media screen and (max-width:480px)
    {

        #collapsibleNavbar .navbar-nav
        {
            flex-direction: column!important;

            height:450px!important;
        }
        .navbar
        {
            height:auto!important;
            position: absolute!important;
            /* top:20; */
            /* z-index:-100!important; */
        }
        .submenu
        {
            position: relative!important;
        }
        .dropdown
        {
            padding-top:8px;
            padding-bottom:8px;


        }
    }

    .table-links a
    {
        font-weight: bold;
        font-size: 14px;
        color: black;

    }
</style>
