{{ Form::open(array('route' => 'user.auth', 'class'=>'form-horizontal')) }}
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="email" name="email" class="form-control" placeholder="Email">
</div>
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-key"></i></span>
    <input type="password" name="password" class="form-control" placeholder="Password">
</div>
<input type="submit" class="btn btn-primary" value="Login"> <a class="btn btn-info" href="{{ route('user.register') }}">Register</a>
{{ Form::close() }}