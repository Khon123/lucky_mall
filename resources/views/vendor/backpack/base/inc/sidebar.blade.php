@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

          
          <li class="treeview">
            <a href="#">
              <i class="fa fa-newspaper-o"></i><span>Menu</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/menu') }}">
                  <i class="fa fa-circle-o"></i><span>Menu</span>
                </a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/sub-menu') }}">
                  <i class="fa fa-circle-o"></i>Sub Menu</a>
              </li>
            </ul>
  
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-home"></i><span>Home</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/home-descriptions') }}">
                  <i class="fa fa-circle-o"></i>Description</a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/home-content') }}">
                  <i class="fa fa-circle-o"></i>Content</a>
              </li>
            </ul>
            
          </li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/slider') }}"><i class="fa fa-image"></i><span>Slider</span></a></li>
  
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/image-submenu') }}"><i class="fa fa-image"></i><span>Image Sub Menu</span></a></li>
  
  
          <li class="treeview">
            <a href="#">
              <i class="fa fa-area-chart"></i><span>Area</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/area-detail') }}">
                  <i class="fa fa-circle-o"></i>Detail</a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/area-information') }}">
                  <i class="fa fa-circle-o"></i>Informations</a>
              </li>
            </ul>
          </li>
          
          <li class="treeview">
            <a href="#">
              <i class="fa fa-image"></i><span>Video and Image</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/video') }}">
                  <i class="fa fa-circle-o"></i>Video</a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/image') }}">
                  <i class="fa fa-circle-o"></i>Image</a>
              </li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i><span>Career</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/career-content') }}">
                  <i class="fa fa-circle-o"></i>Career Content</a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/career') }}">
                  <i class="fa fa-circle-o"></i>Career</a>
              </li>
            </ul>
          </li>
          
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/about') }}"><i class="fa fa-book"></i><span>About</span></a></li>
  
          <hr>
  
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cogs"></i><span>Setting</span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/user') }}">
                  <i class="fa fa-circle-o"></i>USER</a>
              </li>
              
            </ul>
          </li>
          
          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
