@extends('main::layouts.master')

@section('title') Register @endsection
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
            <div class="login-box-body" id="app-5">
                <ul >
                  @if ($errors->any())
                  <ul>
                      @foreach ($errors->all() as $error)
                      <div class="callout callout-danger" >
                          <p class="login-box-msg">{{$error}}</p>
                      </div>
                      @endforeach
                      </ul>
                  @endif

                  @if (\Session::has('message'))
                  <div class="callout callout-info" >
                      <p class="login-box-msg">{!! \Session::get('message') !!}</p>
                  </div>
                  @endif

                  <div v-if="passwordsNotMatch" class="callout callout-danger" >
                      <p class="login-box-msg">Passwords Do not match</p>
                  </div>
                  <div v-if="shortPassword" class="callout callout-danger" >
                      <p class="login-box-msg">Passwords Length should be greater than 6 characters</p>
                  </div>
                </ul>

                <form action="{{route('register.scholar')}}" method="post">
                    @csrf
                  <div class="form-group has-feedback">
                    <input required name="name" type="text" class="form-control" placeholder="Name">
                    <span class="fa fa-pencil form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input required name="email" type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  @verbatim
                  <div class="form-group has-feedback">
                    <input required @change="checkError" v-model="password1" name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input required @change="checkError" v-model="password2" name="password_confirmation" type="password" class="form-control" placeholder="Confirm password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  @endverbatim
                  <div class="row">
                    <div class="col-xs-8">
                      <div class="checkbox icheck">
                        <label>
                          <input name="terms" type="checkbox" required> I agree to the <a href="">Terms of use</a>
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                      <button type="submit" v-bind:class="[halt ? 'hidden' : 'btn-primary', 'errorClass']" class="btn  btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
                <a href="#">I forgot my password</a><br>
                <a href="{{route('login')}}" class="text-center">I already have an account</a>
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



@section('js')

<script>
var app5 = new Vue({
  el: '#app-5',
  data: {
    password1: '',
    password2: '',
    passwordsNotMatch: false,
    shortPassword: false,
    halt: false
    // errors: [
    //   passwordsNotMatch: false
    // ]
  },
  methods: {
    reverseMessage: function () {
      this.message = this.message.split('').reverse().join('')
    },
    checkError: function () {
      if (this.password1 == this.password2) {
        this.passwordsNotMatch = false
      }else{
        this.passwordsNotMatch = true
      }
      if (this.password1.length < 6 && this.password2.length < 6) {
        this.shortPassword = true
      }else{
        this.shortPassword = false
      }

      this.halt = this.shortPassword * this.passwordsNotMatch
      // this.errors.push('sth')
    }
  }
})

</script>



@endsection
