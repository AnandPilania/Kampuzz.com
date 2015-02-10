<?php
if (Auth::check())
{
    $user_name = Auth::user()->name;
    $user_email = Auth::user()->email;
    $user_phone = Auth::user()->phone;
    $user_pincode = Auth::user()->pincode;
} else {
    $user_name = null;
    $user_email = null;
    $user_phone = null;
    $user_pincode = null;
}
?>
<div class="sidebar-widget widget seller-contact-widget">
    <h4 class="widgettitle">Ask a Question</h4>
    @if($errors->has())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="vehicle-enquiry-in">

            <input type="text" name="name" placeholder="Name*" class="form-control" required @if($user_name!='')value="{{ $user_name }}" readonly="readonly" @endif>
            <input type="email" name="email" placeholder="Email address*" class="form-control" required @if($user_email!='')value="{{ $user_email }}" readonly="readonly" @endif>
            <div class="row">
                <div class="col-md-7"><input type="text" name="phone" placeholder="Phone no.*" class="form-control" required @if($user_phone!='')value="{{ $user_phone }}" readonly="readonly" @endif></div>
                <div class="col-md-5"><input type="text" name="pincode" placeholder="PIN Code*" class="form-control" required @if($user_pincode!='')value="{{ $user_pincode }}" readonly="readonly" @endif></div>
            </div>
            <textarea name="question_text" class="form-control" placeholder="Your question"></textarea>
            <label class="checkbox-inline">
                <input type="checkbox" name="newsletter" value="1"> Subscribe To <strong>Kampuzz Newsletter</strong>
            </label>

            <input type="submit" class="btn btn-primary" value="Submit">

    </div>

</div>