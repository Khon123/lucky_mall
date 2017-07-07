<?php
use App\Http\Controllers\Helpers\Language;
?>
<div class="navbar-custom-menu pull-left">
    <ul class="nav navbar-nav">
        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->

        <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        <!-- ========== End of top menu left items ========== -->
    </ul>
</div>


<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- ========================================================= -->
      <!-- ========== Top menu right items (ordered left) ========== -->
      <!-- ========================================================= -->

      <!-- <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Home</span></a></li> -->

        @if (Auth::guest())
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/login') }}">{{ trans('backpack::base.login') }}</a></li>
        @else

            <li style="width:54px;padding-top: 15px;">
                <form action="" method="get">
                    <input type="submit" name="lang"​​ style="background: green ;border:0px;" value="EN"​​​​​​​>
                </form>
            </li>
            <li style="width:54px;padding-top: 15px;">
                <form action="" method="get">
                    <input type="submit" name="lang" value="KH" style="background: red ;border:0px;">
                </form>
            </li>

            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-btn fa-sign-out"></i><?php echo Language::getTitleLang()=='en'?'Logout':'ចាកចេញពីកម្មវិធី'?></a></li>
        @endif

       <!-- ========== End of top menu right items ========== -->
    </ul>
</div>
