 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('images/admin_images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminPanel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image)}}"
               class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ucwords (Auth::guard('admin')->user()->name)}}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(Session::get('page')=="dashboard")
                <?php $active = "active"; ?>
            @else
                <?php $active = ""; ?>
            @endif
            <li class="nav-item">
                <a href="{{url('admin/dashboard')}}" class="nav-link{{$active}}" >

                    <p><i class="nav-icon fas fa-tachometer-alt"></i>Dashboard</p>
                </a>
            </li>
                <!-- Settings -->
            @if(Session::get('page')=="settings" || Session::get('page')=="update-admin-details")
                <?php $active = "active"; ?>
            @else
                <?php $active = ""; ?>
            @endif
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link {{$active}} ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @if(Session::get('page')=="settings")
                    <?php $active = "active"; ?>
                @else
                    <?php $active = ""; ?>
                @endif
              <li class="nav-item">
                <a href="{{url('admin/settings')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Password</p>
                </a>
              </li>
                    @if(Session::get('page')=="update-admin-details")
                        <?php $active = "active"; ?>
                    @else
                        <?php $active = ""; ?>
                    @endif
              <li class="nav-item">
                <a href="{{url('admin/update-admin-details')}}" class="nav-link {{$active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Admin Details</p>
                </a>
              </li>
            </ul>
          </li>
                <!-- Catalogues -->
                @if(
                    Session::get('page')=="products")

                    <?php $active = "active"; ?>
                @else
                    <?php $active = ""; ?>
                @endif
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link {{$active}} ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Catalogues
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Session::get('page')=="couriers")
                            <?php $active = "active"; ?>
                        @else
                            <?php $active = ""; ?>
                        @endif
                        <li class="nav-item">
                            <a href="{{url('admin/couriers')}}" class="nav-link {{$active}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Courier</p>
                            </a>
                        </li>
                            @if(Session::get('page')=="products")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <li class="nav-item">
                                <a href="{{url('admin/products')}}" class="nav-link {{$active}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Products</p>
                                </a>
                            </li>
                            @if(Session::get('page')=="shipments")
                                <?php $active = "active"; ?>
                            @else
                                <?php $active = ""; ?>
                            @endif
                            <li class="nav-item">
                                <a href="{{url('admin/shipments')}}" class="nav-link {{$active}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Shipments</p>
                                </a>
                            </li>
                    </ul>
                </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
