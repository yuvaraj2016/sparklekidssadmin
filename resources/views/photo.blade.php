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
 <!-- CSS Libraries -->

 <link rel="stylesheet" href="{{ asset('modules/datatables/datatables.min.css')}}">
 <link rel="stylesheet" href="{{ asset('modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
 <link rel="stylesheet" href="{{ asset('modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

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


    <section class="section" style="margin-top:-70px;" id="csection">
        <div class="section-header">
          <h1>Photos</h1>
          <div class="section-header-button">
            <a href="{{ url('/photos/create') }}" class="btn btn-primary">Add New</a>
          </div>
          <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{ route('albums') }}">Gallery</a></div>
            <div class="breadcrumb-item"><a href="{{ route('photos') }}">Photos</a></div>
            {{-- <div class="breadcrumb-item">All Posts</div> --}}
          </div>
        </div>
        <div class="section-body">

          {{-- <div class="row">
            <div class="col-12">
              <div class="card mb-0">
                <div class="card-body">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Draft <span class="badge badge-primary">1</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div> --}}

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Photos List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th class="text-center">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>Photo</th>
                          <th>Photo Name</th>
                          <th>Album Name</th>
                          <th>Description</th>
                          <th>Privacy</th>
                          <th>Created BY</th>
                          <th>Created At</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                              <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td>
                            <a href="#">
                                <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                              </a>
                        </td>
                        <td>Throwball Photo</td>
                        <td>
                            Competition
                          </td>

                        <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                        </td>

                        <td>Public</td>
                        <td>Admin</td>
                        <td>2018-01-20</td>
                        <td>
                            <div class="d-flex">
                            <a href="{{ url('photos/1')}}" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="{{ url('photos/1/edit')}}"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="#" class="badge badge-danger d-inline"><i class="fas fa-trash"></i>Delete</a>
                            </div>
                        </td>
                       </tr>
                        <tr>
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                              <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td>
                            <a href="#">
                                <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                              </a>
                        </td>
                        <td>Throwball Photo</td>
                        <td>
                            Competition
                          </td>

                        <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                        </td>

                        <td>Public</td>
                        <td>Admin</td>
                        <td>2018-01-20</td>
                        <td>
                            <div class="d-flex">
                            <a href="{{ url('photos/1')}}" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="{{ url('photos/1/edit')}}"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="#" class="badge badge-danger d-inline"><i class="fas fa-trash"></i>Delete</a>
                            </div>
                        </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                              <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td>
                            <a href="#">
                                <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                              </a>
                        </td>
                        <td>Throwball Photo</td>
                        <td>
                            Competition
                          </td>

                        <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                        </td>

                        <td>Public</td>
                        <td>Admin</td>
                        <td>2018-01-20</td>
                        <td>
                            <div class="d-flex">
                            <a href="{{ url('photos/1')}}" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="{{ url('photos/1/edit')}}"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="#" class="badge badge-danger d-inline"><i class="fas fa-trash"></i>Delete</a>
                            </div>
                        </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                                <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td>
                              <a href="#">
                                  <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                                </a>
                          </td>
                          <td>Throwball Photo</td>
                          <td>
                              Competition
                            </td>

                          <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                          </td>

                          <td>Public</td>
                          <td>Admin</td>
                          <td>2018-01-20</td>
                          <td>
                              <div class="d-flex">
                              <a href="{{ url('photos/1')}}" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                              <a href="{{ url('photos/1/edit')}}"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

                              <a href="#" class="badge badge-danger d-inline"><i class="fas fa-trash"></i>Delete</a>
                              </div>
                          </td>
                            </tr>
                            <tr>
                                <td>
                                  <div class="custom-checkbox custom-control">
                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                                    <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                                  </div>
                                </td>
                                <td>
                                  <a href="#">
                                      <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                                    </a>
                              </td>
                              <td>Throwball Photo</td>
                              <td>
                                  Competition
                                </td>

                              <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                              </td>

                              <td>Public</td>
                              <td>Admin</td>
                              <td>2018-01-20</td>
                              <td>
                                  <div class="d-flex">
                                  <a href="{{ url('photos/1')}}" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                                  <a href="{{ url('photos/1/edit')}}"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

                                  <a href="#" class="badge badge-danger d-inline"><i class="fas fa-trash"></i>Delete</a>
                                  </div>
                              </td>
                                </tr>

                      </tbody>
                    </table>
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
<!-- General JS Scripts -->
<script src="{{asset('modules/jquery.min.js')}}"></script>
<script src="{{asset('modules/popper.js')}}"></script>
<script src="{{asset('modules/tooltip.js')}}"></script>
<script src="{{asset('modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('modules/moment.min.js')}}"></script>
<script src="{{asset('js/stisla.js"')}}"></script>

<script src="{{asset('modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
{{-- <script src="{{asset('modules/jquery-ui/jquery-ui.min.js')}}"></script> --}}
<script src="{{asset('js/page/modules-datatables.js')}}"></script>

{{-- <script>
    $( document ).ready(function() {
        $("#table-2").dataTable({
  "columnDefs": [
    { "sortable": false, "targets": [2,3] }
  ]
});
});

</script>--}}

<!-- JS Libraies -->

<!-- Page Specific JS File -->


<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
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
        #csection
        {
            margin-top:-10px!important;

        }

    }

    .table-links a
    {
        font-weight: bold;
        font-size: 14px;
        color: black;

    }

   </style>
