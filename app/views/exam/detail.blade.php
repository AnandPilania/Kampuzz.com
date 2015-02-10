<?php $breadcrumb_t = $exam->exam_name;
$breadcrumb_p = $exam->exam_title;?>
@extends('layouts.main')
@section('content')
    <article class="single-vehicle-details">
        <div class="single-vehicle-title">

            <h2 class="post-title">{{ $exam->exam_name }}</h2>
        </div>
        <div class="single-listing-actions">
            <div class="btn-group pull-right" role="group">
                @if($bookmark!==NULL)
                    {{ Form::open(array('route' => 'user.deleteBookmark','method' => 'delete', 'class'=>'form-inline')) }}
                    {{ Form::hidden('id', $bookmark->id) }}
                    {{Form::button('<i class="fa fa-check"></i> <span>Follow</span>', ['class' => 'btn btn-primary btn-sm', 'type' => 'submit'])}}

                @else
                    {{ Form::open(array('route' => 'user.saveBookmark', 'class'=>'form-inline')) }}
                    {{Form::button('<i class="fa fa-star-o"></i> <span>Follow</span>', ['class' => 'btn btn-primary btn-sm', 'type' => 'submit'])}}

                @endif

                {{ Form::hidden('bookmark_id', $exam->id) }}
                {{ Form::hidden('bookmark_type', 'Exam') }}
                {{ Form::close() }}


            </div>
        </div>
        <div class="row">
            <div class="col-md-9">

                @if (($exam->logo_file_name != '') &&(File::exists(General::file_url('uploads','PATH').$exam->logo_file_name)))


                    <div class="dealer-prosite">
                        <div class="dealer-avatar">
                            <img src="<?php
                            echo General::file_url('uploads') . $exam->logo_file_name;
                            ?>" alt=""></div>
                    </div>

                    <div class="spacer-50"></div>
                @endif

                @if($exam->exam_intro!='')
                    <blockquote style="margin-top: 0px">
                        <p>{{ $exam->exam_intro }}</p>
                    </blockquote>
                    <div class="spacer-50"></div>
                @endif
                <div class="tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tabEligibility"> Eligibility </a></li>
                        <li><a data-toggle="tab" href="#tabAppProcess"> Application Process </a></li>
                        <li><a data-toggle="tab" href="#tabSyllabus"> Syllabus </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tabEligibility" class="tab-pane active">
                            {{ $exam->eligibility }}
                        </div>
                        <div id="tabAppProcess" class="tab-pane">
                            {{ $exam->application_process }}
                        </div>
                        <div id="tabSyllabus" class="tab-pane">
                            {{ $exam->syllabus }}
                        </div>
                    </div>
                </div>
                <div class="spacer-50"></div>
                <section class="listing-block latest-news">
                    <div class="listing-header">

                        <h4>Latest Articles</h4>
                    </div>
                    <div class="listing-container">
                        <div class="carousel-wrapper">
                            <div class="row">
                                <ul class="owl-carousel" id="news-slider" data-columns="2" data-autoplay=""
                                    data-pagination="yes" data-arrows="yes" data-single-item="no" data-items-desktop="2"
                                    data-items-desktop-small="1" data-items-tablet="2" data-items-mobile="1">
                                    @foreach($exam->tags as $tag)
                                        @foreach($tag->articles as $article)
                                            <li class="item">
                                                <div class="post-block format-standard">
                                                    <!-- <a href="{{ route('articles.detail',['id'=>$article->id,'slug'=>Str::slug($article->article_title)])}}" class="media-box post-image"><img src="images/post2.jpg" alt=""></a> -->
                                                    <div class="post-actions">
                                                        <div class="post-date">{{ General::format_date_local($article->article_publish_date) }}</div>

                                                    </div>
                                                    <h3 class="post-title"><a
                                                                href="{{ route('articles.detail',['id'=>$article->id,'slug'=>Str::slug($article->article_title)])}}">{{ $article->article_title }}</a>
                                                    </h3>

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
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>


                <h4>Related Guides &amp; E-Books</h4>
                @foreach($exam->tags as $tag)
                    @foreach ($tag->products as $product)
                        @include('includes.product_thumb')
                    @endforeach
                @endforeach
            </div>
            <!-- Vehicle Details Sidebar -->
            <div class="col-md-3 vehicle-details-sidebar sidebar">


                <div class="widget sidebar-widget widget_recent_reviews">
                    <h4 class="widgettitle">Important Dates</h4>
                    @foreach($exam->examdates as $date)
                        <div class="post-block post-review-block">
                            <div class="review-status">
                                <strong>{{ General::format_date_local($date->event_date,'d') }}</strong>
                                <span>{{ General::format_date_local($date->event_date,'M, Y') }}</span>
                            </div>
                            {{ $date->event_name }}
                        </div>
                    @endforeach
                </div>


                @include('includes.ask_questions')


            </div>
        </div>
    </article>
@stop