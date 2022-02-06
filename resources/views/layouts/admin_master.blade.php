<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | Bunny Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/skins/skin-red.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>Run</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Bunny</b>RUN</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          @php 
              $data= App\Models\SystemUser::find(Session::get('Usersession')['UserId'])
          @endphp
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{asset('admin/dist/img/avatar.png')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs" style="text-transform:uppercase;">{{$data->username}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{asset('admin/dist/img/avatar.png')}}" class="img-circle" alt="User Image">

                <p>
                  <span style="text-transform:uppercase">{{Session::get('Usersession')['UserName']}}</span>
                  <br>
                  @php
                    $usertype =Session::get('Usersession')['UserType'];
                  @endphp
                  @if($usertype==1)
                    Owner
                  @endif
                  @if($usertype==2)
                    Administrator
                  @endif
                  @if($usertype==3)
                    Manager
                  @endif
                  @if($usertype==4)
                    Editor
                  @endif
                  <?php 
                  if(Session::get('Usersession')['branch']!=0){
                    $branch = DB::table('branchs')->where('id',Session::get('Usersession')['branch'])->first();
                    $b_name =$branch->branch_name;
                  }
                  if(Session::get('Usersession')['branch']==0){
                    $b_name ="Owner";                      
                  }
                  ?>
                  <small>Branch Name : {{$b_name}}</small>
                  
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/system/userprofile')}}" class="btn btn-info btn-flat"><i class="fa fa-user"></i> Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('/logout')}}" class="btn btn-danger btn-flat"><i class="fa fa-power-off"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
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
          <img src="{{asset('admin/dist/img/avatar.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Welcome</p>
          <!-- Status -->
          {{$data->username}}
        </div>
      </div>

      <!-- search form (Optional) -->
      <!--
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form> -->
      <!-- /.search form -->
     
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MODULES HEADING</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="treeview {{ Request::is('order/*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-share-square"></i> <span>Delivery Orders</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('order/member') ? 'active' : '' }}"><a href="{{url('/order/member')}}">Member Orders</a></li>
            <li class="{{ Request::is('order/onetime') ? 'active' : '' }}"><a href="{{url('/order/onetime')}}">OneTime User Orders</a></li>
            <li class="{{ Request::is('order/clicent') ? 'active' : '' }}"><a href="{{url('/order/client')}}">Client Orders</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('people/*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-users"></i> <span>Peoples</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('people/clients') ? 'active' : '' }}"><a href="{{url('/people/clients')}}">Clients</a></li>
            <li class="{{ Request::is('people/users') ? 'active' : '' }}"><a href="{{url('/people/users')}}">Users</a></li>
            <li class="{{ Request::is('people/delimen') ? 'active' : '' }}"><a href="{{url('/people/delimen')}}">Delivery Men</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('office/*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-home"></i> <span>Office</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('office/employee') ? 'active' : '' }}"><a href="{{url('/office/employee')}}">Add Employee</a></li>
            <li class="{{ Request::is('office/emplist') ? 'active' : '' }}"><a href="{{url('/office/emplist')}}">Employee List</a></li>
            <li class="{{ Request::is('office/department') ? 'active' : '' }}"><a href="{{url('/office/department')}}">Department</a></li>
            <li class="{{ Request::is('office/branch') ? 'active' : '' }}"><a href="{{url('/office/branch')}}">Branch</a></li>
          </ul>
        </li>
        <li class="treeview {{ Request::is('system/*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-gears"></i> <span>System Setup</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('system/creatUser') ? 'active' : '' }}"><a href="{{url('/system/creatUser')}}">Create System User</a></li>
            <li class="{{ Request::is('system/userlist') ? 'active' : '' }}"><a href="{{url('/system/userlist')}}">System User List</a></li>
            <li class="{{ Request::is('system/township') ? 'active' : '' }}"><a href="{{url('/system/township')}}">Township/State</a></li>
            <li class="{{ Request::is('system/zone') ? 'active' : '' }}"><a href="{{url('/system/zone')}}">Zone/Area</a></li>
          </ul>
        </li>
        <li ><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
    @yield('content')
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Bunny Run Delivery
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="#">Lh@</a>.</strong> All rights reserved.
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
<script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('#example1').DataTable({
          aLengthMenu: [
            [30, 50, 100, 200, -1],
            [30, 50, 100, 200, "All"]
          ],
        });
      });
      </script>
</body>
</html>