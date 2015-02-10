<?php $breadcrumb_t = $course->college->college_name;
$breadcrumb_p = $course->college->city_name;?>
@extends('layouts.main')
@section('content')
    <article class="single-vehicle-details">
        <div class="single-vehicle-title">

            <h2 class="post-title">{{ $course->course_name }}</h2>
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

                {{ Form::hidden('bookmark_id', $course->course_id) }}
                {{ Form::hidden('bookmark_type', 'Course') }}
                {{ Form::close() }}

                {{ Form::open(array('route' => 'user.request_contact', 'class'=>'form-inline')) }}
                @if($contactAccess!==NULL)
                    {{Form::button('<i class="fa fa-check"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}
                @else
                    {{Form::button('<i class="fa fa-users"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}
                @endif
                {{ Form::hidden('entity_id', $course->college->college_id) }}
                {{ Form::hidden('entity_type', 'College') }}
                {{ Form::close() }}

                {{ Form::open(array('route' => 'user.request_brochure', 'class'=>'form-inline')) }}
                {{Form::button('<i class="fa fa-calendar"></i> <span>Download Brochure</span>', ['class' => 'btn btn-info btn-sm', 'type' => 'submit'])}}

                {{ Form::hidden('entity_id', $course->course_id) }}
                {{ Form::hidden('entity_type', 'Course') }}
                {{ Form::close() }}

            </div>
            @if($course->college->college_rating>0)
                <div class="vehicle-cost">
                    Rating: <?php echo General::giveStars($course->college->college_rating);?></div>@endif
        </div>
        <div class="row">
            <div class="col-md-8">

                <div>

                    <div class="points-review">
                        <div class="row">
                            <div class="col-md-12">
                                @if($course->detail->course_duration!='')
                                    <div class="review-point">
                                        <i class="fa fa-clock-o"></i> <strong>Course Duration</strong>

                                        <div class="course-description-container">
                                            {{ $course->detail->course_duration }}
                                        </div>
                                    </div>
                                @endif

                                @if($course->detail->exam_required!='')
                                    <div class="review-point">
                                        <i class="fa fa-qrcode"></i> <strong>Exam Required</strong>

                                        <div class="course-description-container">
                                            {{ str_limit($course->detail->exam_required,200) }}
                                        </div>
                                    </div>
                                @endif

                                @if($course->detail->total_fee!='')
                                    <div class="review-point">
                                        <i class="fa fa-money"></i> <strong>Total Fee</strong>

                                        <div class="course-description-container">
                                            <i class="fa fa-inr"></i> {{ $course->detail->total_fee }}
                                        </div>
                                    </div>
                                @endif

                                @if($course->detail->affiliation!='')
                                    <div class="review-point">
                                        <i class="fa fa-paperclip"></i> <strong>Affiliation</strong>

                                        <div class="course-description-container">
                                            {{ strip_tags($course->detail->affiliation) }}
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="spacer-50"></div>
                @if($course->college->images->count()>0)
                    <div class="single-listing-images">
                        <div class="additional-images">
                            <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes"
                                data-single-item="no" data-items-desktop="4" data-items-desktop-small="4"
                                data-items-tablet="3" data-items-mobile="3">
                                @foreach($course->college->images as $image)
                                    <li class="item format-image"><a
                                                href="{{ General::file_url('college_images') . $image->file_name }}"
                                                data-rel="prettyPhoto[gallery]" class="media-box"><img
                                                    src="{{ General::file_url('college_images') . $image->file_name }}"
                                                    alt=""></a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="spacer-50"></div>
                <div class="accordion" id="accordionArea">
                    <?php $i = 0;foreach ($course->features as $feature) { ?>
                    <div class="accordion-group panel">
                        <div class="accordion-heading accordionize"><a
                                    class="accordion-toggle @if($i==0){{ 'active' }} @endif" data-toggle="collapse"
                                    data-parent="#accordionArea"
                                    href="#{{ $i }}Area"> <?php echo $feature->feature_title;?> <i
                                        class="fa fa-angle-down"></i> </a></div>
                        <div id="{{ $i }}Area" class="accordion-body @if($i==0){{ 'in' }} @endif collapse">
                            <div class="accordion-inner"> <?php echo $feature->feature_content;?></div>
                        </div>
                    </div>
                    <?php $i++;}?>
                </div>


            </div>
            <!-- Vehicle Details Sidebar -->
            <div class="col-md-4 vehicle-details-sidebar sidebar">
                <div class="sidebar-widget widget">

                    <div class="vehicle-block format-standard">
                        <a class="media-box">
                            <div class="media-box-center">
                                <img src="<?php if (($course->college->college_logo_img != '') && (File::exists(General::file_url('college_logo', 'PATH') . $course->college->college_logo_img)))
                                {
                                    echo General::file_url('college_logo') . $course->college->college_logo_img;
                                } else
                                {
                                    echo asset('images/no-thumb.png');
                                }?>" alt="{{ $course->college->college_name }}">
                            </div>
                        </a>

                        <div class="vehicle-block-content">

                            <h4 class="vehicle-title">{{ $course->college->college_name }}</h4>

                        </div>
                    </div>

                    <div class="spacer-50"></div>
                    <a href="{{ route('college',['id'=>$course->college->college_id,'slug'=>Str::slug($course->college->college_name . '-' . $course->college->city_name)]) }}"
                       class="btn btn-info" title="All Courses"><i class="fa fa-file-text-o"></i> <span>All Courses in this Institute</span></a>

                    <div class="spacer-50"></div>

                    <div class="panel panel-info price-suggestion">
                        <div class="panel-heading">
                            <h5 class="panel-title">Contact Info</h5>
                        </div>
                        <div class="panel-body">
                            <i class="fa fa-building-o"></i> <b>{{ $course->college->college_name }}</b><br>
                            {{ $course->college->college_address }}<br><br>

                            @if($contactAccess!==NULL)
                                @if($course->college->college_contact_person!='')<i class="fa fa-user"></i>
                                <b>{{ $course->college->college_contact_person }}</b><br>@endif

                                @if($course->college->college_phone!='')<i class="fa fa-phone"></i>
                                <b>{{ $course->college->college_phone }}</b><br>@endif

                                @if($course->college->college_email!='')<i class="fa fa-envelope"></i> <a
                                        href="mailto:{{ $course->college->college_email }}">{{ $course->college->college_email }}</a>
                                <br>@endif

                                @if($course->college->college_url!='')<i class="fa fa-external-link"></i> <a
                                        target="_blank"
                                        href="{{ $course->college->college_url }}">{{ $course->college->college_url }}</a>
                                <br>@endif
                            @else
                                {{ Form::open(array('route' => 'user.request_contact', 'class'=>'form-inline')) }}
                                {{Form::button('<i class="fa fa-users"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}

                                {{ Form::hidden('entity_id', $course->college->college_id) }}
                                {{ Form::hidden('entity_type', 'College') }}
                                {{ Form::close() }}
                            @endif


                        </div>
                    </div>

                </div>

                {{ Form::open(array('route' => 'user.ask_question')) }}
                @include('includes/ask_questions')
                {{ Form::hidden('question_id', $course->course_id) }}
                {{ Form::hidden('question_type', 'Course') }}
                {{ Form::close() }}
            </div>
        </div>
    </article>
@stop