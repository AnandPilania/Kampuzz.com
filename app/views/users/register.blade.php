@extends('layouts.main')
<?php
$breadcrumb_t = 'Sign Up';
?>
@section('content')
    <div class="row">
        <div class="col-md-8">

            <h2>Get started with Kampuzz</h2>
            <p>Kampuzz.com is a leading education portal of India.
                We have mammoth guide of colleges, courses & exams</p>

            <div class="spacer-20"></div>
            <div class="icon-box ibox-rounded ibox-light ibox-effect">
                <div class="ibox-icon">
                    <i class="fa fa-list-alt"></i>
                </div>
                <h3>Mammoth Database of Colleges &amp; Courses</h3>
                <p>At Kampuzz we have huge database of colleges and courses around the world</p>
            </div>
            <div class="spacer-20"></div>
            <div class="icon-box ibox-rounded ibox-light ibox-effect">
                <div class="ibox-icon">
                    <i class="fa fa-cogs"></i>
                </div>
                <h3>Ask and Help</h3>
                <p>Ask questions, clear your doubts and help others</p>
            </div>
            <div class="spacer-20"></div>

            <div class="icon-box ibox-rounded ibox-light ibox-effect">
                <div class="ibox-icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <h3>Online Marketplace</h3>
                <p>At Kampuzz we have many educational products to be purchased online</p>
            </div>
            <hr class="fw">


            <!-- Testimonials -->
            <section class="listing-block latest-testimonials">
                <div class="listing-header">
                    <h3>Testimonials</h3>
                </div>
                <div class="listing-container">
                    <div class="carousel-wrapper">
                        <div class="row">
                            <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="2" data-autoplay="5000" data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="2" data-items-desktop-small="1" data-items-tablet="1" data-items-mobile="1">
                                @foreach($testimonials as $testimonial)
                                    <li class="item">
                                        <div class="testimonial-block">
                                            <blockquote>
                                                <p>{{ $testimonial->testimonial_text }}</p>
                                            </blockquote>
                                            <div class="testimonial-info">
                                                <div class="testimonial-info-in">
                                                    <strong>{{ $testimonial->poster_name }}</strong><span>{{ $testimonial->poster_organization }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-4">
            <section class="signup-form sm-margint">
                {{ Form::open(array('route' => 'user.store', 'class'=>'form-horizontal')) }}
                    <!-- Regular Signup -->
                    <div class="regular-signup">
                        <h3>Create an account</h3>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email">

                        <label class="checkbox-inline"><input type="checkbox">By signing up, I agree to the <a href="#">terms &amp; conditions</a> and <a href="#">privacy policy</a></label>
                        <div class="spacer-20"></div>
                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Create account">
                    </div>
                    <!-- Social Signup -->
                    <div class="social-signup">
                        <span class="or-break">or</span>
                        <button type="button" class="btn btn-block btn-facebook btn-social"><i class="fa fa-facebook"></i> Signup with Facebook</button>
                        <button type="button" class="btn btn-block btn-twitter btn-social"><i class="fa fa-google"></i> Signup with Google</button>
                    </div>
                {{ Form::close() }}
            </section>
        </div>
    </div>



@stop