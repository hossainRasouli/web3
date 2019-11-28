
@extends('layout.login.master')
@section('content')

    <div id="single-wrapper">
        <form action="{{route('login')}}" class="frm-single" method="POST">
            {{csrf_field()}}
            <div class="inside">
                <div class="title"><strong>{{isset($panel_title) ?$panel_title:''}}</strong>Admin</div>
                <!-- /.title -->
                <div class="frm-title">Login</div>
                <!-- /.frm-title -->
                <div class="frm-input {{$errors->has('username') ?'has-error':''}}"><input type="text" placeholder="نام کاربری" class="frm-inp" name="username"><i class="fa fa-user frm-ico" ></i>
                    {!! $errors->first('username','<span class="help-block">:message</span>') !!}
                </div>
                <!-- /.frm-input -->
                <div class="frm-input {{$errors->has('password') ?'has-error':''}}"><input type="password" placeholder="رمز عبور" class="frm-inp" name="password"><i class="fa fa-lock frm-ico"></i>
                    {!! $errors->first('password','<span class="help-block">:message</span>') !!}
                </div>
                <!-- /.frm-input -->
                <div class="clearfix margin-bottom-20">
                    <div class="pull-left">
                        <div class="checkbox primary"><input type="checkbox" id="remember" name="remember"><label for="remember">Remember me</label></div>
                        <!-- /.checkbox -->
                    </div>
                    <!-- /.pull-left -->
                    <div class="pull-right"><a href="page-recoverpw.html" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
                    <!-- /.pull-right -->
                </div>
                <!-- /.clearfix -->
                <button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
                <div class="row small-spacing">
                    <div class="col-sm-12">
                        <div class="txt-login-with txt-center">or login with</div>
                        <!-- /.txt-login-with -->
                    </div>
                    <!-- /.col-sm-12 -->
                    <div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></button></div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button></div>
                    <!-- /.col-sm-6 -->
                </div>
                <!-- /.row -->
                <a href="#" class="a-link"><i class="fa fa-key"></i>New to {{isset($panel_title) ?$panel_title:''}}? Register.</a>
                <div class="frm-footer">{{isset($panel_title) ?$panel_title:''}} © 2016.</div>
                <!-- /.footer -->
            </div>
            <!-- .inside -->
        </form>
        <!-- /.frm-single -->
    </div><!--/#single-wrapper -->


    @endsection