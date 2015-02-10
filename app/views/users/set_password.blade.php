@extends('layouts.main')
<?php
$breadcrumb_t = 'Activate Account';
?>
@section('content')

    <div class="row">

        <h3>Please choose a Password</h3>


        <div class="row">
            <div class="col-md-6">
                {{ Form::open(array('route' => 'user.set_password', 'class'=>'form-horizontal')) }}
                <div class="form-group">
                    {{ Form::label('new_password', 'Password', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::password('new_password',  array('class' => 'form-control','required' => 'required')) }}
                    </div>
                    {{ General::returnError('new_password',$errors) }}
                </div>

                <div class="form-group">
                    {{ Form::label('confirm_password', 'Confirm Password', array('class' => 'col-sm-3 control-label')) }}
                    <div class="col-sm-9">
                        {{ Form::password('confirm_password',  array('class' => 'form-control','required' => 'required')) }}
                    </div>
                    {{ General::returnError('confirm_password',$errors) }}
                </div>

                {{ Form::hidden('email', $user->email) }}
                {{ Form::hidden('verification_token', $user->verification_token) }}
                <div class="sub-box text-right">
                    <span>{{Form::submit('Activate', ['class' => 'btn btn-sm btn-primary'])}}</span>
                </div>
                {{ Form::close() }}
            </div>

        </div></div>
@stop