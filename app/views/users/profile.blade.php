@extends('layouts.main')
<?php
$breadcrumb_t = 'Profile';
?>
@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <section class="signup-form sm-margint">
                {{ Form::model($user, array('route' => 'user.profile', 'class'=>'form-horizontal')) }}
                <!-- Regular Signup -->
                <div class="regular-signup">
                    <h3>Update Profile or Change Password</h3>
                    {{ Form::label('name', 'Name', array('class' => 'control-label')) }}
                    {{ Form::text('name', NULL, array('class' => 'form-control','required' => 'required')) }}

                    {{ Form::label('mobile', 'Mobile', array('class' => 'control-label')) }}
                    {{ Form::text('mobile', NULL, array('class' => 'form-control','required' => 'required')) }}
                    <div class="alert alert-info">To change your password please fill in the columns below. You may
                        leave the fields blank if not changing the password.
                    </div>
                    {{ Form::label('password', 'Current Password', array('class' => 'control-label')) }}
                    {{ Form::password('password',  array('class' => 'form-control')) }}

                    {{ Form::label('new_password', 'New Password', array('class' => 'control-label')) }}
                    {{ Form::password('new_password',  array('class' => 'form-control')) }}

                    {{ Form::label('confirm_password', 'Confirm Password', array('class' => 'control-label')) }}
                    {{ Form::password('confirm_password',  array('class' => 'form-control')) }}

                    <div class="spacer-20"></div>
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update">
                </div>

                {{ Form::close() }}
            </section>


        </div>
    </div>




@stop