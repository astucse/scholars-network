@extends('main::layouts.master')

@section('content')
    
<div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              &nbsp;
              <!-- <small>Example 2.0</small> -->
            </h1>
            <ol class="breadcrumb">
              <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
              <!-- <li><a href="#">Layout</a></li> -->
              <!-- <li class="active">Login</li> -->
            </ol>
          </section>
    
    <div class="row rows">
    <div class="col-xs-4"></div>	
    <div class="col-xs-4">	
        <div class="login-box">
            <div class="login-box-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->
    
            <form action="{{route('login.submit')}}" method="post">
                @csrf
                  <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                    <div class="col-xs-8">
                      <div class="checkbox icheck">
                        <label>
                          <!-- <input type="checkbox"> Remember Me -->
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
                <a href="#">I forgot my password</a><br>
                <a href="{{route('register')}}" class="text-center">Register a new membership</a>
            </div>
        </div>
    </div>
    <!-- <div class="col-xs-6">
        <img src="assets/dist/img/photo2.png" style="height: 300px; width: 650px" class="img-responsive">
    </div> -->
    
    
    </div>
    
    
    
    
    
    
    </div>
    </div>
    
@stop
