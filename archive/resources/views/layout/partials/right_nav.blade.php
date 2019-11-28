<div class="main-menu">
    <header class="header">
        <a href="javascript:void(0);" class="logo"><i class="ico mdi mdi-cube-outline"></i>بخش ادمین</a>
        <button type="button" class="button-close fa fa-times js__menu_close"></button>
        <div class="user">
            <a href="#" class="avatar"><img  src="assets/images/logo.jpg" alt="" style="max-width:  120px; max-height: 156px; margin: -35px;margin-right: -6px; border: none "><span class="status online"></span></a>
            <h5 class="name"><a href="javascript:void(0)">{{ucwords(Auth::user()->name)}}</a></h5>
            <h5 class="position">Administrator</h5>
            <!-- /.name -->
            <div class="control-wrap js__drop_down">
                <i class="fa fa-caret-down js__drop_down_button"></i>
                <div class="control-list">
                    <div class="control-item"><a href="javascript:void(0)"><i class="fa fa-user"></i> پروفایل</a></div>
                    <div class="control-item"><a href="javascript:void(0);"><i class="fa fa-gear"></i> تنظیمات</a></div>
                    <div class="control-item"><a href="{{url('/logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" ></i> خروج</a></div>
                    <form action="{{route('logout')}}" method="POST" id="logout-form" style="display: none;">
                        {{csrf_field()}}
                    </form>
                </div>
                <!-- /.control-list -->
            </div>
            <!-- /.control-wrap -->
        </div>
        <!-- /.user -->
    </header>
    <!-- /.header -->
    <div class="content">

        <div class="navigation">
            <h5 class="title">Navigation</h5>
            <!-- /.title -->
            <ul class="menu js__accordion nav" id="sidebar">
                <li class="current nav_home" >
                    <a class="waves-effect " href="javascript:ajaxLoad('{{route('home.list')}}')"><i class="menu-icon mdi mdi-view-dashboard" ></i><span>داشبورد</span></a>
                </li>
               
                         {{--ssn Menu--}}
                     <li class="active">
                        <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-box"></i><span>تذکره الکترونیکی</span><span class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content nav" id="nav-sidebar">
                            <li ><a href="javascript:ajaxLoad('{{route('ssn.create')}}')">ثبت شخص جدید :</a></li>
                            <li ><a href="javascript:ajaxLoad('{{route('ssn.list')}}')">لیست اشخاص:</a></li>
                            <li ><a href="javascript:ajaxLoad('{{route('ssn.report')}}')">گزارش </a></li>
                            
                            
                        </ul>
                        <!-- /.sub-menu js__content -->
                    </li>

                                {{--employee reports Menu--}}
                <li class="active">
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-box"></i><span>بخش کارمندان</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content nav" id="nav-sidebar">

                        <li class="nav_expense"><a href="#employee">لیست  کارمندان:</a></li>
                        <li ><a href="#employee/create">ثبت کارمند جدید:</a></li>
                        <li class="nav_customer"><a href="#employeereport">لیست طلب کاری کارمندان</a></li>
                        <li ><a href="#employeereport/create">ثبت معاشات کارمندان:</a></li>
                    
                    </ul>
                    <!-- /.sub-menu js__content -->
                </li>
        
                {{--User Menu--}}
                <li >
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-circle"></i><span>کاربر</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content nav" id="nav-sidebar">
                        {{--User Menu--}}
                        <li class="nav_user"><a href="javascript:ajaxLoad('{{route('user.list')}}')">لیست کاربر</a></li>
                        <li  ><a href="javascript:ajaxLoad('{{route('user.create')}}')">ثبت کاربر جدید</a></li>

                    </ul>
                    <!-- /.sub-menu js__content -->

            </ul>
            <!-- /.menu js__accordion -->
        </div>
        <!-- /.navigation -->
    </div>
    <!-- /.content -->
</div>
<!-- /.main-menu -->