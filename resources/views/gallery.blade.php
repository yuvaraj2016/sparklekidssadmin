@extends('layouts.app')

@section('head')
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

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
      <li class="dropdown"><a href="{{ route('/gallery')}}" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            Gallery </a>
            <div class="dropdown-menu dropdown-menu-right submenu" style="height:auto; left:0px!important;">
              {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
              <a href="{{ route('/albums')}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Albums
              </a>
              {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon"> --}}
                {{-- <i class="fas fa-cog"></i> Settings
              </a> --}}
              <div class="dropdown-divider"></div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Photos
              </a>


            </div>
          </li>
          {{-- <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

            <div class="d-sm-none d-lg-inline-block">Testimonial</div></a>
            <div class="dropdown-menu dropdown-menu-right" style="height:auto;">

            </div>
          </li> --}}
         <li class="dropdown">
              <a class="nav-link nav-link-lg nav-link-user" href="#">Testimonial</a>
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
          <h1>Albums</h1>
          <div class="section-header-button">
            <a href="features-post-create.html" class="btn btn-primary">Add New</a>
          </div>
          <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Gallery</a></div>
            <div class="breadcrumb-item"><a href="#">Albums</a></div>
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
          <div class="row mt-4">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="float-left">
                    <select class="form-control selectric">
                      <option>Action For Selected</option>
                      <option>Move to Draft</option>
                      <option>Move to Pending</option>
                      <option>Delete Pemanently</option>
                    </select>
                  </div>
                  <div class="float-right">
                    <form>
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                          <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="clearfix mb-3"></div>

                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th class="text-center pt-2">
                          <div class="custom-checkbox custom-checkbox-table custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                          </div>
                        </th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Cover Picture</th>
                        <th>Privacy</th>
                        <th>Created BY</th>
                        <th>Created At</th>
                        <th>Actions</th>
                      </tr>
                      <tr>
                        <td>
                          <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                            <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                        </td>
                        <td>
                          Students and parents are participated in this ceremony
                        </td>
                        <td>
                          <a href="#">
                            <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                          </a>
                        </td>
                        <td>Public</td>
                        <td>Admin</td>
                        <td>2018-01-20</td>
                        <td>
                            <div class="d-flex">
                            <a href="#" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="#"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

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
                        <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                        </td>
                        <td>
                          Students and parents are participated in this ceremony
                        </td>
                        <td>
                          <a href="#">
                            <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                          </a>
                        </td>
                        <td>Public</td>
                        <td>Admin</td>
                        <td>2018-01-20</td>
                        <td>
                            <div class="d-flex">
                            <a href="#" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="#"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

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
                        <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                        </td>
                        <td>
                          Students and parents are participated in this ceremony
                        </td>
                        <td>
                          <a href="#">
                            <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                          </a>
                        </td>
                        <td>Public</td>
                        <td>Admin</td>
                        <td>2018-01-20</td>
                        <td>
                            <div class="d-flex">
                            <a href="#" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="#"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

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
                        <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                        </td>
                        <td>
                          Students and parents are participated in this ceremony
                        </td>
                        <td>
                          <a href="#">
                            <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                          </a>
                        </td>
                        <td>Public</td>
                        <td>Admin</td>
                        <td>2018-01-20</td>
                        <td>
                            <div class="d-flex">
                            <a href="#" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="#"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

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
                        <td><span class="text-center justify-content-center" style="padding-top:10px;">School Anniversary</span>

                        </td>
                        <td>
                          Students and parents are participated in this ceremony
                        </td>
                        <td>
                          <a href="#">
                            <img alt="image" src="{{ asset('img/avatar/avatar-5.png')}}" class="rounded-circle" width="35" data-toggle="title" title="">
                          </a>
                        </td>
                        <td>Public</td>
                        <td>Admin</td>
                        <td>2018-01-20</td>
                        <td>
                            <div class="d-flex">
                            <a href="#" class="badge badge-primary d-inline"><i class="fas fa-eye"></i>View&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="#"  class="badge badge-info d-inline"><i class="fas fa-edit"></i>Edit&nbsp;&nbsp;</a>&nbsp;&nbsp;

                            <a href="#" class="badge badge-danger d-inline"><i class="fas fa-trash"></i>Delete</a>
                            </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="float-right">
                    <nav>
                      <ul class="pagination">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
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
<script src="assets/modules/jquery.min.js"></script>
<script src="assets/modules/popper.js"></script>
<script src="assets/modules/tooltip.js"></script>
<script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="assets/modules/moment.min.js"></script>
<script src="assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
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
