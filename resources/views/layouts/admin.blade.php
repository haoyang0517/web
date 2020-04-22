<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Activity Scheduler</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('coolAdmin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('coolAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('coolAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('coolAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('coolAdmin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('coolAdmin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('coolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('coolAdmin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('coolAdmin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('coolAdmin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('coolAdmin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('coolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('coolAdmin/css/theme.css') }}" rel="stylesheet" media="all">
    <!-- AJAX-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <!-- FullCalendar-->
    <link href="{{ asset('coolAdmin/vendor/fullcalendar-3.10.0/fullcalendar.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <style type="text/css">
    /* force class color to override the bootstrap base rule
       NOTE: adding 'url: #' to calendar makes this unneeded
     */
    .fc-event, .fc-event:hover {
          color: #fff !important;
          text-decoration: none;
    }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ route("calendar") }}">
                            <img src="{{ asset('images/icon/logo') }}" alt="Activity Scheduler" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                      <li>
                          <a href="{{ route("calendar") }}">
                              <i class="fas fa-calendar-alt"></i>Calendar</a>
                      </li>
                      <li>
                          <a href="activity">
                              <i class="fas fa-list-alt"></i>Activity</a>
                      </li>
                      <li>
                          <a href="areas">
                              <i class="fas fa-users"></i>Community</a>
                      </li>

                      <li>
                          <a href="table.html">
                              <i class="zmdi zmdi-settings"></i>Setting</a>
                      </li>
                      <li>
                          <a href="{{ route('logout')}}">
                              <i class="zmdi zmdi-power"></i>Logout</a>
                      </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{ route("calendar") }}" style="color:black; font-weight:400">
                  <div>
                      <img src="{{ asset('images/icon/logo.png') }}">Activity Scheduler </img>
                  </div>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                        <!--<li class="active has-sub">-->
                            <a href="{{ route("calendar") }}">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="{{url('/activities')}}">
                                <i class="fas fa-list-alt"></i>Activity</a>
                        </li>
                        <li>
                            <a href="{{url('/areas')}}">
                                <i class="fas fa-users"></i>Community</a>
                        </li>

                        <li>
                            <a href="{{url('/settings')}}">
                                <i class="zmdi zmdi-settings"></i>Setting</a>
                        </li>
                        <li>
                          <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <i class="nav-icon fas fa-fw fa-sign-out-alt">
                            </i>
                              Logout
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid" style="float: right;">
                        <div class="header-wrap">

                            <div class="header-button">

                                <div class="account-wrap" >
                                    <div class="account-item clearfix js-item-menu">

                                        <div class="content">
                                            <a class="js-acc-btn" href="#">User</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown" >
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="{{ asset('coolAdmin/images/icon/avatar-01.jpg') }}" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="#">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content" style=" padding-top:90px;padding-left:20px; padding-right:20px">
                <div >
                  @yield('content')
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Jquery JS-->
    <script src="{{ asset('coolAdmin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('coolAdmin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('coolAdmin/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/select2/select2.min.js') }}"></script>

    <!-- Main JS-->

    <script src="{{ asset('coolAdmin/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <!-- Data Table -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!-- Full Calendar -->
    <script src="{{ asset('coolAdmin/vendor/fullcalendar-3.10.0/lib/moment.min.js') }}"></script>
    <script src="{{ asset('coolAdmin/vendor/fullcalendar-3.10.0/fullcalendar.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        var table = $('#datatable').DataTable();
        //edit areas
        table.on('click','.edit',function(){
          $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
              $tr = $tr.prev('.parent');
          }
          var data = table.row($tr).data();
          console.log(data);

          $('#name').val(data[2]);

          $('#editForm').attr('action','/areas/'+data[1]);
          $('#editModal').modal('show');
        });

        //delete data
        table.on('click','.delete',function(){
          $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
              $tr = $tr.prev('.parent');
          }
          var data = table.row($tr).data();
          console.log(data);

          //$('#name').val(data[2]);

          $('#deleteForm').attr('action','/areas/'+data[1]);
          $('#deleteModal').modal('show');
        });

        table.on('click','.remove',function(){
          $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
              $tr = $tr.prev('.parent');
          }
          var data = table.row($tr).data();
          console.log(data);

          $('#email').val(data[2]);

          $('#removeForm').attr('action','/areas/'+data[1]);
          $('#removeModal').modal('show');
        });
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    </script>
    <script type="text/javascript">
    $('.datetime').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',
      locale: 'en',
      sideBySide: true
    })
    </script>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
    </form>


    @yield('scripts')
</body>

</html>
<!-- end document-->
