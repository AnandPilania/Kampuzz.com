@extends('layouts.main')
@section('content')
<!-- Welcome Content and Services overview -->
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="uppercase strong">Welcome to Kampuzz</h1>
                        <p class="lead">Kampuzz.com is a leading education portal of India.<br>We have mammoth guide of  <span class="accent-color">colleges, courses &amp; exams</span></p>
                    </div>
                    <div class="col-md-6">
                        <p>KAMPUZZ serves as one of the leading information provider in the field of Education, and provides best

results and solutions with scrutinized researching amongst a bundle. It represents a unique identity in 

the enlarged sector comprising of Academic Portal, and maintains an Indian originality at its best. 

KAMPUZZ offers the online seekers with simplified, traditionalized and rapid search results, and allow 

you to manage your searches distinctively from one category to another.</p>
                    </div>
                </div>
                <div class="spacer-75"></div>
                <!-- Recently Listed Vehicles -->
                <section class="listing-block recent-vehicles">
                    <div class="listing-header">
                        <h3>Recently Listed Colleges</h3>
                    </div>
                    <div class="listing-container">
                        <div class="carousel-wrapper">
                            <div class="row">
                                <ul class="owl-carousel carousel-fw" id="vehicle-slider" data-columns="4" data-autoplay="" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="4" data-items-desktop-small="3" data-items-tablet="2" data-items-mobile="1">
                                @foreach($colleges as $college)
                                    <li class="item">
                                        <div class="vehicle-block format-standard">
                                            <a href="{{ route('college',['id'=>$college->college_id,'slug'=>Str::slug($college->college_name . '-' . $college->city_name)]) }}" class="media-box">
<div class="media-box-center">
                                            <img src="<?php if (($college->college_logo_img != '') &&(File::exists(General::file_url('college_logo','PATH').$college->college_logo_img)))
                                {
                                    echo General::file_url('college_logo') . $college->college_logo_img;
                                } else
                                {
                                    echo asset('images/no-thumb.png');
                                }?>" alt="{{ $college->college_name }}">
</div>
                                </a>
                                            <div class="vehicle-block-content">
                                               
                                                <h5 class="vehicle-title"><a href="{{ route('college',['id'=>$college->college_id,'slug'=>Str::slug($college->college_name . '-' . $college->city_name)]) }}">{{ $college->college_name }}</a></h5>
                                                <span class="vehicle-meta"><span class="orange-color"><i class="fa fa-list" class="orange-color"></i></span> Courses: {{ $college->courses->count() }} &nbsp; <span class="orange-color"><i class="fa fa-file-image-o"></i></span> Photos: {{ $college->images->count() }} </span>
                                                
                                                @if($college->college_rating>0)<span class="vehicle-cost">{{ General::giveStars($college->college_rating) }}</span>@endif
                                            </div>
                                        </div>
                                    </li>
                               @endforeach     
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="spacer-60"></div>
                <div class="row">
                    <!-- Latest News -->
                    <div class="col-md-8 col-sm-6">
                        <section class="listing-block latest-news">
                            <div class="listing-header">
                                <a href="{{ route('articles')}}" class="btn btn-sm btn-default pull-right">More news</a>
                                <h3>Latest News</h3>
                            </div>
                            <div class="listing-container">
                                <div class="carousel-wrapper">
                                    <div class="row">
                                        <ul class="owl-carousel" id="news-slider" data-columns="2" data-autoplay="" data-pagination="yes" data-arrows="yes" data-single-item="no" data-items-desktop="2" data-items-desktop-small="1" data-items-tablet="2" data-items-mobile="1">
                                        @foreach($articles as $article)
                                            <li class="item">
                                                <div class="post-block format-standard">
                                                    <!-- <a href="{{ route('articles.detail',['id'=>$article->id,'slug'=>Str::slug($article->article_title)])}}" class="media-box post-image"><img src="images/post2.jpg" alt=""></a> -->
                                                    <div class="post-actions">
                                                        <div class="post-date">{{ General::format_date_local($article->article_publish_date) }}</div>
                                                        
                                                    </div>
                                                    <h3 class="post-title"><a href="{{ route('articles.detail',['id'=>$article->id,'slug'=>Str::slug($article->article_title)])}}">{{ $article->article_title }}</a></h3>
                                                    <div class="post-content">
                                                        <p>{{ $article->article_intro }}</p>
                                                    </div>
                                                    <div class="post-meta">
                                                        Posted in: @foreach($article->categories as $category)
                                                        <a href="{{ route('articles.category',['id'=>$category->id,'slug'=>Str::slug($category->category_name)])}}">{{ $category->category_name }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="spacer-40"></div>
                        <!-- Latest Testimonials -->
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
                    <!-- Latest Reviews -->
                    <div class="col-md-4 col-sm-6 sidebar">
                        <section class="listing-block latest-reviews">
                            
                            <div class="widget sidebar-widget widget_categories">
                            <div class="listing-header">
                                <a href="{{ route('exams.index') }}" class="btn btn-sm btn-default pull-right">All exams</a>
                                <h3>Popular Exams</h3>
                            </div>
                            <ul>
                             <?php $i=1 ?>
                        @foreach($exams as $exam)
                        <li><a href="{{ route('exam.detail',['id'=>$exam->id, 'slug'=>Str::slug($exam->exam_name)]) }}" class="colrhovr">{{ $exam->exam_name }}</a> {{ $exam->exam_status }}
                        </li>
                                <?php $i++ ?>
                        @endforeach
                            </ul>
                        </div>
                        </section>
                        <div class="spacer-40"></div>
                        <!-- Connect with us -->
                        <section class="connect-with-us widget-block">
                            <h4><i class="fa fa-rss"></i> Connect with us</h4>
                            <form role="form">
                                <label for="NewsletterInput" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="NewsletterInput" placeholder="Subscribe via email">
                                <button type="submit" class="btn btn-sm btn-primary">Subscribe</button>
                                <span class="meta-data">Don't worry, we won't spam you</span>
                            </form>
                            <hr>
                            <h4><i class="fa fa-twitter"></i> Twitter feed</h4>
                            {{--<div class="twitter-widget" data-tweets-count="2"></div>--}}
                        </section>
                    </div>
                </div>
                @stop