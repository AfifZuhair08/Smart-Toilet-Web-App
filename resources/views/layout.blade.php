<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Smart Toilet</title>
  <link rel="icon" href="{!! asset('storage/dash/Smart Toilet.png') !!}"/>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-cogs"></i>
        </div> --}}
        {{-- <div class="sidebar-brand-text mx-3"><h5><b>Smart Toilet</b></h5></div> --}}
        <img class="text-center img-fluid" src="/storage/dash/SmartToiletClear.png" alt="">
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <h5>
          <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            Dashboard
          </a>
        </h5>
      </li>

      <!-- Nav Item - Posts -->
      <li class="nav-item">
          <h5><a class="nav-link collapsed" href="/posts" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true" aria-controls="collapseTwo">
            <!--<i class="fas fa-fw fa-cog"></i>-->
            <i class="fas fa-fw fa-blog"></i>
            {{-- <span>Posts</span> --}} Posts
          </a></h5>
          <div id="collapsePost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">View all:</h6>
              <a class="collapse-item" href="/posts">Broadcast</a>
              <a class="collapse-item" href="/userposts">My Posts</a>
            </div>
          </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <h6>Monitoring System</h6>
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <h5>
        <a class="nav-link collapsed" href="/monitor" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <!--<i class="fas fa-fw fa-cog"></i>-->
          <i class="fas fa-fw fa-chart-area"></i>
          {{-- <span>Monitor</span> --}}Monitor
        </a></h5>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tissue Dispenser:</h6>
            {{-- <a class="collapse-item" href="/rtmTissueToday" target="_blank">Real-Time Data</a> --}}
            <a class="collapse-item" href="/toiletDispenser/monitorTD">Locations</a>
            <a class="collapse-item" href="/rtmTissue">Monthly Entries</a>
            <div class="dropdown-divider"></div>
            <h6 class="collapse-header">Soap Dispenser:</h6>
            {{-- <a class="collapse-item" href="/rtmSoapToday" target="_blank">Real-Time Data</a> --}}
            <a class="collapse-item" href="/toiletDispenser/monitorSD">Locations</a>
            <a class="collapse-item" href="/rtmSoap">Monthly Entries</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <h5>
        <a class="nav-link collapsed" href="/databaserecord" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          {{-- <span>Record</span> --}}Record
        </a></h5>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Service Record:</h6>
            <a class="collapse-item" href="/records/servicerecords">Service Activity Records</a>
            <div class="dropdown-divider"></div>
            <h6 class="collapse-header">Database Record:</h6>
            <a class="collapse-item" href="/sensorTissue/datarecord">Tissue Dispenser State</a>
            <a class="collapse-item" href="/sensorSoap/datarecord">Soap Dispenser State</a>
            <!--<a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>-->
          </div>
        </div>
      </li>

      <li class="nav-item">
        <h5>
        <a class="nav-link collapsed" href="/servicetask" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
          <i class="fas fa-fw fa-wrench"></i>
          {{-- <span>Service Task</span> --}}Service Task
        </a></h5>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage</h6>
            <a class="collapse-item" href="/tasks/create">Create task</a>
            <a class="collapse-item" href="/tasks">All Task</a>
            <a class="collapse-item" href="/tasks/status">All Tasks Status</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <h6>Manage</h6>
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <h5>
        <a class="nav-link collapsed" href="/databaserecord" data-toggle="collapse" data-target="#collapseInventory" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-warehouse"></i>
          {{-- <span>Record</span> --}}Inventory
        </a></h5>
        <div id="collapseInventory" class="collapse" aria-labelledby="collapseInventory" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Dispensers:</h6>
            <a class="collapse-item" href="/dispenser">All Dispensers</a>
            <a class="collapse-item" href="/dispenser/create">Register</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <h5>
        <a class="nav-link collapsed" href="/manage" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
          <i class="fas fa-fw fa-users"></i>
          Staffs
        </a></h5>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage</h6>
            <a class="collapse-item" href="/staffs">Staff Accounts</a>
            {{-- <a class="collapse-item" href="/stafflist">Staff List</a> --}}
            <a class="collapse-item" href="/staffs/create">Register</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <h5>
        <a class="nav-link collapsed" href="/manage" data-toggle="collapse" data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages3">
          <i class="fas fa-fw fa-users"></i>
          Managers
        </a></h5>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage</h6>
            <a class="collapse-item" href="/users">Manager Accounts</a>
            <a class="collapse-item" href="/users/create">Register</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            {{-- <div class="nav-link btn-group"> --}}
            <li class="nav-item dropdown no-arrow mx-1">
              <div class="nav-link btn-group">
                  <button type="button" class="btn btn-default btn-md dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @php  echo date('l, '); echo date('j F Y') @endphp
                  </button>
              </div>
            </li>
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}
            
            @guest

            @else

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              
              <div class="nav-link btn-group">
                {{-- User Name Button --}}
                <button type="button" class="btn btn-success btn-md dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ ucwords(Auth::user()->name) }}
                </button>
                
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/users/{{Auth::user()->id}}">
                    <i class="fas fa-fw fa-user"></i>
                    <b>My Profile</b>
                  </a>
                  <div class="dropdown-divider"></div>
                  
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <b>{{ __('Logout') }}</b>
                  </a>
                  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
                
                <div class="nav-link dropdown-toggle" style="width: 70px" data-toggle="dropdown" aria-haspopup="true">
                  <img class="rounded-circle float-right" style="width: 100%" src="/storage/user/{{Auth::user()->userImage}}" alt="">
                </div>
                
              </div>
            </li>

            @endguest
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          {{-- @include('inc.cpmessage') --}}
          @yield('main-content')
        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Smart Toilet 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <script src="{{url( '/vendor/chart.js/Chart.min.js' )}}"></script>
  <script src="{{url( '/vendor/chart.js/ChartTissue.js' )}}"></script>
  <script src="{{url( '/vendor/chart.js/ChartSoap.js' )}}"></script>
  

</body>

</html>
