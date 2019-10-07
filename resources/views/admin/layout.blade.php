<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">

  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="{{ asset('css/skin-blue.min.css	') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 

        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
       <!--  <script type="text/javascript">
          $.ajaxSetup({
          headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script> -->
<style type="text/css">
  .error{
    color: red;
  }
  .row{
    margin-right: 120px;
  }
</style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<?php
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  }

  ?>
  
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="{{url('/')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
    <!--   <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">



          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            @if (Route::has('login'))
            <div style="font-size: 25px;padding: 7px; margin: 0px 5px;">
              @auth


              <a class="" href="{{ route('logout') }}"
              style="color: white; margin-left: -30px;" 
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>


            @else
            <a style="color:white;"  href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a style="color:white;"  href="{{ route('register') }}">Register</a>
            @endif

            @endauth
          </div>
          @endif

        </li>
        <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{URL::asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <ul class="sidebar-menu" data-widget="tree">

        <!-- Optionally, you can add icons to the links -->

        <li class=<?php echo (Request::path() == "home") ?'active':'' ?>> <a href="{{ url('home') }}"><i class=""></i> <span>Dashboard</span></a> </li>

        <li class="treeview  <?php echo (Request::path() == "user/list" or Request::path() == "add/user/view") ?'active open':'' ?>">
          <a href="#"><i class=""></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class=<?php echo (Request::path() == "user/list") ?'active':'' ?>><a  href="{{ url('user/list') }}">Users List</a></li>
            <li class=<?php echo (Request::path() == "add/user/view") ?'active':'' ?>><a href="{{url('add/user/view')}}">Add User</a></li>
          </ul>
        </li>

        <li class="treeview  <?php echo (Request::path() == "config_list" or Request::path() == "config") ?'active open':'' ?>">
          <a href="#"><i class=""></i> <span>Configuration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class=<?php echo (Request::path() == "config_list") ?'active':'' ?>>
              <a href="{{ url('config_list') }}"><i class=""></i> <span>Configuration list</span></a>
            </li>
            <li class=<?php echo (Request::path() == "config") ?'active':'' ?>><a href="{{url('config')}}">Add Configuration</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo (Request::path() == "list_banner" or Request::path() == "banner") ?'active open':'' ?>">
          <a href="#"><i class=""></i> <span>Banner</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu  ">
            <li class=<?php echo (Request::path() == "list_banner") ?'active':'' ?>>
              <a href="{{ url('list_banner') }}"><i class=""></i> <span>Banner list</span></a>
            </li>
            <li class=<?php echo (Request::path() == "banner") ?'active':'' ?>><a href="{{url('banner')}}">Add Banner</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo (Request::path() == "list_category" or Request::path() == "category") ?'active open':'' ?>">
          <a href="#"><i class=""></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=<?php echo (Request::path() == "list_category") ?'active':'' ?>>
              <a href="{{ url('list_category') }}"><i class=""></i> <span>Category list</span></a>
            </li>
            <li class=<?php echo (Request::path() == "category") ?'active':'' ?>><a href="{{url('category')}}">Add Category</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo (Request::path() == "list_product" or Request::path() == "product" or Request::path() == "product_atrribute" or Request::path() == "list_product_attribute") ?'active open':'' ?>">
          <a href="#"><i class=""></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu  ">
            <li class=<?php echo (Request::path() == "list_product") ?'active':'' ?>>
              <a href="{{ url('list_product') }}"><i class=""></i> <span>Product list</span></a>
            </li>
            <li class=<?php echo (Request::path() == "product") ?'active':'' ?>><a href="{{url('product')}}">Add Product</a></li>
            <li class=<?php echo (Request::path() == "product_atrribute") ?'active':'' ?>><a href="{{url('product_atrribute')}}">Add Product Attribute</a></li>
            <li class=<?php echo (Request::path() == "list_product_attribute") ?'active':'' ?>><a href="{{url('list_product_attribute')}}">Product Attribute list</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo (Request::path() == "list_coupon" or Request::path() == "coupon") ?'active open':'' ?>">
          <a href="#"><i class=""></i> <span>Coupon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu  ">
            <li class=<?php echo (Request::path() == "list_coupon") ?'active':'' ?>>
              <a href="{{ url('list_coupon') }}"><i class=""></i> <span>Coupon list</span></a>
            </li>
            <li class=<?php echo (Request::path() == "coupon") ?'active':'' ?>><a href="{{url('coupon')}}">Add Coupon</a></li>
          </ul>
        </li>
        <li class=<?php echo (Request::path() == "list_review") ?'active':'' ?>> <a href="{{ url('list_review') }}"><i class=""></i> <span>Review list</span></a> </li>

        <li class="treeview <?php echo (Request::path() == "sales" or Request::path() == "customer" or Request::path() == "coupon_report") ?'active open':'' ?>">
          <a href="#"><i class=""></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class=<?php echo (Request::path() == "sales") ?'active':'' ?>>
              <a href="{{ url('sales') }}"><i class=""></i> <span>Sales Report</span></a>
            </li>
            <li class=<?php echo (Request::path() == "customer") ?'active':'' ?>><a href="{{url('customer')}}">Customer Registered</a></li>
            <li class=<?php echo (Request::path() == "coupon_report") ?'active':'' ?>><a href="{{url('coupon_report')}}">Coupon Used</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo (Request::path() == "order_table") ?'active open':'' ?>">
          <a href="#"><i class=""></i> <span>Order Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
      <!-- <li>
        <a href="{{ url('sales') }}"><i class=""></i> <span>Order Details</span></a>
      </li> -->
      <li class=<?php echo (Request::path() == "order_table") ?'active':'' ?>><a href="{{url('order_table')}}">Order Table</a></li>
      <!-- <li><a href="{{url('coupon_report')}}">Coupon Used</a></li> -->
    </ul>
  </li>
  <li class="treeview  <?php echo (Request::path() == "show_payment" or Request::path() == "list_payment") ?'active open':'' ?>">
    <a href="#"><i class=""></i> <span>Payment Gateway</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu ">
      <li class=<?php echo (Request::path() == "show_payment") ?'active':'' ?>>
        <a href="{{ url('show_payment') }}"><i class=""></i> <span>Add Payment</span></a>
      </li>
      <li class=<?php echo (Request::path() == "list_payment") ?'active':'' ?>><a href="{{url('list_payment')}}">List Payment</a></li>
    </ul>
  </li>
  <li class="treeview  <?php echo (Request::path() == "show_cms" or Request::path() == "list_cms") ?'active open':'' ?>">
    <a href="#"><i class=""></i> <span>Cms Features</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu ">
      <li class=<?php echo (Request::path() == "show_cms") ?'active':'' ?>>
        <a href="{{ url('show_cms') }}"><i class=""></i> <span>Add Cms</span></a>
      </li>
      <li class=<?php echo (Request::path() == "list_cms") ?'active':'' ?>><a href="{{url('list_cms')}}">List Cms</a></li>
    </ul>
  </li>
  <li class="treeview <?php echo (Request::path() == "show_email" or Request::path() == "list_email") ?'active open':'' ?>">
    <a href="#"><i class=""></i> <span>Email Template</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu  ">
      <li class=<?php echo (Request::path() == "show_email") ?'active':'' ?>>
        <a href="{{ url('show_email') }}"><i class=""></i> <span>Add Email</span></a>
      </li>
      <li class=<?php echo (Request::path() == "list_email") ?'active':'' ?>><a href="{{url('list_email')}}">List Email</a></li>
    </ul>
  </li>
</ul>
<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div>


    <!-- Main content -->
    <section style="padding: 1px;padding-left: 15px;padding-right: 15px;" class="content container-fluid">
     @if(session()->has('message.level'))
     <div class="alert alert-{{ session('message.level') }}"> 
      {!! session('message.content') !!}
    </div>
    @endif
    @yield('content')

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer>
  <!-- To the right -->
  
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane active" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:;">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:;">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="pull-right-container">
                <span class="label label-danger pull-right">70%</span>
              </span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->
    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
    <!-- /.tab-pane -->
    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Some information about this general settings option
          </p>
        </div>
        <!-- /.form-group -->
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
</aside>
<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>

  <!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->


  <!-- Bootstrap 3.3.7 -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('js/adminlte.min.js') }}"></script>
  <script src="{{ asset('js/user.js') }}"></script>
  <script src="{{ asset('js/category.js') }}"></script>
  <script src="{{ asset('js/banner.js') }}"></script>
  <script src="{{ asset('js/attribute.js') }}"></script>
  <script src="{{ asset('js/coupon.js') }}"></script>
  <script src="{{ asset('js/product.js') }}"></script>
  <script src="{{ asset('js/config.js') }}"></script>
  <script src="{{ asset('js/pay.js') }}"></script>
  <script src="{{ asset('js/cms.js') }}"></script>
  <script src="{{ asset('js/email.js') }}"></script>
<!-- <script type="text/javascript">
  
  $(".treeview-menu").click(function(e) {
   
   var $this = $(this);
    $this.addClass("active open");
   
});
</script> -->


@yield('js')
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
   </body>
   </html>
