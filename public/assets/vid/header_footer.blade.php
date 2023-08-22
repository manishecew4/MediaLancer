<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Home</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/backend/backend_css.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/backend/jquery.dataTables.min.css')}}" />
    <!-- FontAwesome 4.3.0 -->
    <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
        folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    
    

    {{-- Toggle Button --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    
    <style>
    .error {
      color: red;
      font-weight: normal;
    }
    </style>
    <script src="//code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript">
      var baseURL=window.location.origin;
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">

    @php

      $dashboard = '';

      $slide_menu = '';
      $add_slider = '';
      $slider_list = '';

      $meet_menu = '';
      $meet_add = '';
      $meet_list = '';
      
      $service_menu = '';
      $service_add = '';
      $service_list = '';
      
      $planing_menu = '';
      $planing_add = '';
      $planing_list = '';
     
      $review_menu = '';
      $review_add = '';
      $review_list = '';
      $team_list = '';
      
      $service_blog_menu = '';
      $service_blog_add = '';
      $service_blog_list = '';
      
      $ad_menu = '';
      $ad_add = '';
      $ad_list = '';
      
      $hq_menu = '';
      $proposal_list = '';
      $intimation_list = '';

      $contact_menu = '';
      $query_menu = '';

      if(Request::is('admin/dashboard')){
        $dashboard = 'active open';
      }

      if(Request::is('admin/slider/add')){
        $slide_menu = 'active open';
        $add_slider = 'active';
      }
      if(Request::is('admin/slider/list')){
        $slide_menu = 'active open';
        $slider_list = 'active';
      }
      
      if(Request::is('admin/meeting/add')){
        $meet_menu = 'active open';
        $meet_add = 'active';
      }
      if(Request::is('admin/meeting/list')){
        $meet_menu = 'active open';
        $meet_list = 'active';
      }
      
      if(Request::is('admin/service/add')){
        $service_menu = 'active open';
        $service_add = 'active';
      }
      if(Request::is('admin/service/list')){
        $service_menu = 'active open';
        $service_list = 'active';
      }

      if(Request::is('admin/planing/add')){
        $planing_menu = 'active open';
        $planing_add = 'active';
      }
      if(Request::is('admin/planing/list')){
        $planing_menu = 'active open';
        $planing_list = 'active';
      }
      
      if(Request::is('admin/customer_review/add')){
        $review_menu = 'active open';
        $review_add = 'active';
      }
      if(Request::is('admin/customer_review/list')){
        $review_menu = 'active open';
        $review_list = 'active';
      }
      if(Request::is('admin/myteam')){
        $review_menu = 'active open';
        $team_list = 'active';
      }
      
      if(Request::is('admin/service/blog/add')){
        $service_blog_menu = 'active open';
        $service_blog_add = 'active';
      }
      if(Request::is('admin/service/blog/list')){
        $service_blog_menu = 'active open';
        $review_list = 'active';
      }

      if(Request::is('admin/ad/add')){
        $ad_menu = 'active open';
        $ad_list = 'active';
      }
      if(Request::is('admin/ad/list')){
        $ad_menu = 'active open';
        $ad_list = 'active';
      }
      
      if(Request::is('admin/contacts')){
        $contact_menu = 'active';
      }
      
      if(Request::is('admin/user/quries')){
        $query_menu = 'active';
      }

      if(Request::is('admin/health/proposals')){
        $hq_menu = 'active open';
        $proposal_list = 'active';
      }
      if(Request::is('admin/health/intimations')){
        $hq_menu = 'active open';
        $intimation_list = 'active';
      }


    @endphp

    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/admin')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini" style="font-size: 16px;">Modi Invest</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-md" style="font-size: 14px;">
            <img src="{{asset('images/logo.png')}}" width="30px" height="30px">
            Modi Invest
          </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('images/avatar.png')}}" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">{{$AdminData->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <img src="{{asset('images/avatar.png')}}" class="img-circle" alt="User Image" />
                    <p>
                      {{ucfirst($AdminData->name)}}
                      <small>Administrator</small>
                    </p>
                    
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{url('/profile')}}" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Profile</a>
                    </div>
                    <div class="pull-right">
                      <a class="btn btn-default" href="{{ url('/admin/logout') }}"><i class="fa fa-sign-out"></i> Log Out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>                    
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{$dashboard}}">
              <a href="{{url('/admin')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
            <li class="treeview {{$slide_menu}} ">
              <a href="#"><i class="fa fa-sliders" aria-hidden="true"></i>Manage Slider
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=" {{$add_slider}} "><a href="{{url('/admin/slider/add')}}"><i class="fa fa-plus"></i> Add </a></li>
                <li class=" {{$slider_list}} "><a href="{{url('/admin/slider/list')}}"><i class="fa fa-list"></i> List </a></li>
              </ul>
            </li>

            <li class="treeview {{$meet_menu}} ">
              <a href="#"><i class="fa fa-meetup" aria-hidden="true"></i>Manage Metting
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=" {{$meet_add}} "><a href="{{url('/admin/meeting/add')}}"><i class="fa fa-plus"></i> Add </a></li>
                <li class=" {{$meet_list}} "><a href="{{url('/admin/meeting/list')}}"><i class="fa fa-list"></i> List </a></li>
              </ul>
            </li>

            <li class="treeview {{$service_menu}} ">
              <a href="#"><i class="fa fa-bullhorn" aria-hidden="true"></i>Manage Service
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=" {{$service_add}} "><a href="{{url('/admin/service/add')}}"><i class="fa fa-plus"></i> Add </a></li>
                <li class=" {{$service_list}} "><a href="{{url('/admin/service/list')}}"><i class="fa fa-list"></i> List </a></li>
              </ul>
            </li>
            
            <li class="treeview {{$planing_menu}} ">
              <a href="#"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Manage Planing
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=" {{$planing_add}} "><a href="{{url('/admin/planing/add')}}"><i class="fa fa-plus"></i> Add </a></li>
                <li class=" {{$planing_list}} "><a href="{{url('/admin/planing/list')}}"><i class="fa fa-list"></i> List </a></li>
              </ul>
            </li>
            
            <li class="treeview {{$review_menu}} ">
              <a href="#"><i class="fa fa-flag" aria-hidden="true"></i>Manage Review/Team
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=" {{$review_add}} "><a href="{{url('/admin/customer_review/add')}}"><i class="fa fa-plus"></i> Add </a></li>
                <li class=" {{$review_list}} "><a href="{{url('/admin/customer_review/list')}}"><i class="fa fa-list"></i> Reviews </a></li>
                <li class=" {{$team_list}} "><a href="{{url('/admin/myteam')}}"><i class="fa fa-list"></i> My Team </a></li>
              </ul>
            </li>

            <li class="treeview {{$service_blog_menu}} ">
              <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Manage Service Blog
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=" {{$service_blog_add}} "><a href="{{url('/admin/service/blog/add')}}"><i class="fa fa-plus"></i> Add </a></li>
                <li class=" {{$service_blog_list}} "><a href="{{url('/admin/service/blog/list')}}"><i class="fa fa-list"></i> List </a></li>
              </ul>
            </li>

            <li class="treeview {{$ad_menu}} ">
              <a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Manage Ad
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=" {{$ad_add}} "><a href="{{url('/admin/ad/add')}}"><i class="fa fa-plus"></i> Add </a></li>
                <li class=" {{$ad_list}} "><a href="{{url('/admin/ad/list')}}"><i class="fa fa-list"></i> List </a></li>
              </ul>
            </li>

            <li class=" {{$contact_menu}} ">
              <a href="{{url('/admin/contacts')}}"><i class="fa fa-users" aria-hidden="true"></i>Contacts
              </a>
            </li>
            
            <li class=" {{$query_menu}} ">
              <a href="{{url('/admin/user/quries')}}"><i class="fa fa-calculator" aria-hidden="true"></i>Calculation Queries
              </a>
            </li>

            <li class="treeview {{$hq_menu}} ">
              <a href="#"><i class="fa fa-medkit" aria-hidden="true"></i>Health Queries
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=" {{$proposal_list}} "><a href="{{url('/admin/health/proposals')}}"><i class="fa fa-list"></i> Proposals </a></li>
                <li class=" {{$intimation_list}} "><a href="{{url('/admin/health/intimations')}}"><i class="fa fa-list"></i> Intimations</a></li>
              </ul>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      @yield('admin_content')
      <!-- Modal End -->

      <footer class="main-footer" style="text-align: center;">
        <strong>Copyright &copy; <?php echo date('Y'); ?></strong> All rights reserved.
      </footer>        

      {{-- Toggle Button --}}
      <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
      
      <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}} "></script>
      <script src="{{asset('dist/js/adminlte.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/backend/jquery.dataTables.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/backend/jquery.validate.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/backend/validation.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/backend/sweetalert.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('js/backend/common.js')}}"></script>
      <script src="{{asset('js/backend/tiny.js')}}"></script>
      <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
      <script src="//cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
      <script src="//cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
      <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>


      <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

      <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
      <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
      <script src="//cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

      {{-- Select 2 --}}
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      {{-- Select 2 --}}
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </div>

    <script type="text/javascript">
      var windowURL = window.location.href;
      pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
      var x = $('a[href="' + pageURL + '"]');
      x.addClass('active');
      x.parent().addClass('active');
      var y = $('a[href="' + windowURL + '"]');
      y.addClass('active');
      y.parent().addClass('active');
    </script>
  </body>

</html>