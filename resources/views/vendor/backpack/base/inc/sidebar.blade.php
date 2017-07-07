<?php
  use App\Http\Controllers\Helpers\Language;
?>
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
          {{--<li class="header">{{ trans('backpack::base.administration') }}</li>--}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span><?php echo Language::getTitleLang()=='en'?'Dashboard':'ផ្ទាំងគ្រប់គ្រង'?></span></a></li>

          
          <li class="treeview">
            <a href="#">
              <i class="fa fa-newspaper-o"></i><span><?php echo Language::getTitleLang()=='en'?'Menu':'ម៉ឺនុយ'?></span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/menu') }}">
                  <i class="fa fa-circle-o"></i><span><?php echo Language::getTitleLang()=='en'?'Menu':'ម៉ឺនុយ'?></span>
                </a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/sub-menu') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'Sub Menu':'ម៉ឺនុយរង'?></a>
              </li>
            </ul>
  
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-home"></i><span><?php echo Language::getTitleLang()=='en'?'Home':'ទំព័រដើម'?></span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/home-descriptions') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'Description':'ការពិពណ៌នា'?></a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/home-content') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'Content':'មាតិកា'?></a>
              </li>
            </ul>
            
          </li>

          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/slider') }}"><i class="fa fa-image"></i><span><?php echo Language::getTitleLang()=='en'?' Slider':' ស្លាយដឺ'?></span></a></li>
  
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/image-submenu') }}"><i class="fa fa-image"></i><span><?php echo Language::getTitleLang()=='en'?' Image Sub Menu':' រូបភាពម៉ឺនុយរង'?></span></a></li>
  
  
          <li class="treeview">
            <a href="#">
              <i class="fa fa-area-chart"></i><span><?php echo Language::getTitleLang()=='en'?'Common Area':'កន្លែងសម្រាប់ជួល'?></span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/area-detail') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'Description':'ការពិពណ៌នា'?></a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/area-information') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'Information':'ព័ត៌មានកន្លែងជួល'?></a>
              </li>
            </ul>
          </li>
          
          <li class="treeview">
            <a href="#">
              <i class="fa fa-image"></i><span><?php echo Language::getTitleLang()=='en'?'Video and Image':'វីដេអូនិងរូបភាព'?></span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/video') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'Video':'វីដេអូ'?></a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/image') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'Image':'រូបភាព'?></a>
              </li>
            </ul>
          </li>
  
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i><span><?php echo Language::getTitleLang()=='en'?'Career':'ការងារ'?></span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/career-content') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'Career Description':'ពិពណ៌នាការងារ'?></a>
              </li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/career') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'Career Information':'ព័ត៌មានអំពីការងារ'?></a>
              </li>
            </ul>
          </li>
          
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/about') }}"><i class="fa fa-book"></i><span><?php echo Language::getTitleLang()=='en'?'About Us':'អំពីពួកយើង'?></span></a></li>
  
          <hr>
  
          <li class="treeview">
            <a href="#">
              <i class="fa fa-cogs"></i><span><?php echo Language::getTitleLang()=='en'?'Setting':'ការកំំណត់'?></span>
              <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
            </a>
            <ul class="treeview-menu">
              <li>
              <li>
                <a href="{{ url(config('backpack.base.route_prefix', 'admin').'/user') }}">
                  <i class="fa fa-circle-o"></i><?php echo Language::getTitleLang()=='en'?'USER':'អ្នកប្រើប្រាស់'?></a>
              </li>
              
            </ul>
          </li>
          
          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span><?php echo Language::getTitleLang()=='en'?'Logout':'ចាកចេញពីកម្មវិធី'?></span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
