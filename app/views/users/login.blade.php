@extends('layouts.main')
<?php
$breadcrumb_t = 'Login';
?>
@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <section class="signup-form sm-margint">
                {{ Form::open(array('route' => 'user.auth', 'class'=>'form-horizontal')) }}    <!-- Regular Signup -->
                <div class="regular-signup">
                    <h3>Login</h3>

                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                    <input type="password" name="password" class="form-control" placeholder="Password">

                    <div class="spacer-20"></div>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Login">
                </div>
                <!-- Social Signup -->
                <div class="social-signup">
                    <span class="or-break">or</span>
                    <button type="button" onclick="login('{{ route('fblogin') }}')" class="btn btn-block btn-facebook btn-social"><i class="fa fa-facebook"></i>
                        Login with Facebook
                    </button>
                    <button type="button" onclick="login('{{ route('glogin') }}')" class="btn btn-block btn-twitter btn-social"><i class="fa fa-google"></i>
                        Login with Google
                    </button>
                </div>
                {{ Form::close() }}
            </section>


        </div>
    </div>


@stop