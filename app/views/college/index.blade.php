<?php $breadcrumb_t = $college->college_name;
$breadcrumb_p = $college->city_name;?>
@extends('layouts.main')
@section('content')

    <article class="single-vehicle-details">
        <div class="single-vehicle-title">
            @if($college->college_established!='')<span
                    class="badge-premium-listing">Established: {{ $college->college_established }}</span>@endif
            <h2 class="post-title">{{ $college->college_name }}</h2>
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

                {{ Form::hidden('bookmark_id', $college->college_id) }}
                {{ Form::hidden('bookmark_type', 'College') }}
                {{ Form::close() }}

                {{ Form::open(array('route' => 'user.request_contact', 'class'=>'form-inline')) }}
                @if($contactAccess!==NULL)
                    {{Form::button('<i class="fa fa-check"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}
                @else
                    {{Form::button('<i class="fa fa-users"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}
                @endif
                {{ Form::hidden('entity_id', $college->college_id) }}
                {{ Form::hidden('entity_type', 'College') }}
                {{ Form::close() }}

                {{ Form::open(array('route' => 'user.request_brochure', 'class'=>'form-inline')) }}
                {{Form::button('<i class="fa fa-calendar"></i> <span>Download Brochure</span>', ['class' => 'btn btn-info btn-sm', 'type' => 'submit'])}}

                {{ Form::hidden('entity_id', $college->college_id) }}
                {{ Form::hidden('entity_type', 'College') }}
                {{ Form::close() }}

            </div>
            @if($college->college_rating>0)
                <div class="vehicle-cost">Rating: <?php echo General::giveStars($college->college_rating);?></div>@endif
        </div>
        <div class="row">
            <div class="col-md-8">

                <blockquote>
                    <p>{{ $college->why_join }}</p>
                </blockquote>

                @if($college->images->count()>0)
                    <div class="single-listing-images">
                        <div class="additional-images">
                            <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes"
                                data-single-item="no" data-items-desktop="4" data-items-desktop-small="4"
                                data-items-tablet="3" data-items-mobile="3">
                                @foreach($college->images as $image)
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
                <h4>Courses Offered:</h4>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="80%">Course Name</th>
                        <th>Duration</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 0;foreach ($college->courses as $course) {?>
                    <tr>
                        <td><a class="link"
                               href="{{ route('courses.detail',['id'=>$course->course_id,'slug'=>Str::slug($course->course_name)]); }}">{{ $course->course_name  }}</a>
                        </td>
                        <td> {{ $course->course_duration  }}</td>
                    </tr>
                    <?php }?>

                </table>
                <div class="spacer-50"></div>
                <div class="accordion" id="accordionArea">
                    <?php $i = 0;foreach ($college->features as $feature) { ?>
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
                                <img src="<?php if (($college->college_logo_img != '') && (File::exists(General::file_url('college_logo', 'PATH') . $college->college_logo_img)))
                                {
                                    echo General::file_url('college_logo') . $college->college_logo_img;
                                } else
                                {
                                    echo asset('images/no-thumb.png');
                                }?>" alt="{{ $college->college_name }}">
                            </div>
                        </a>

                        <div class="vehicle-block-content">

                            <h4 class="vehicle-title">{{ $college->college_name }}</h4>

                        </div>
                    </div>

                    <div class="spacer-50"></div>


                    <div class="panel panel-info price-suggestion">
                        <div class="panel-heading">
                            <h5 class="panel-title">Contact Info</h5>
                        </div>
                        <div class="panel-body">
                            <i class="fa fa-building-o"></i> <b>{{ $college->college_name }}</b><br>
                            {{ $college->college_address }}<br><br>

                            @if($contactAccess!==NULL)
                                @if($college->college_contact_person!='')<i class="fa fa-user"></i>
                                <b>{{ $college->college_contact_person }}</b><br>@endif

                                @if($college->college_phone!='')<i class="fa fa-phone"></i>
                                <b>{{ $college->college_phone }}</b><br>@endif

                                @if($college->college_email!='')<i class="fa fa-envelope"></i> <a
                                        href="mailto:{{ $college->college_email }}">{{ $college->college_email }}</a>
                                <br>@endif

                                @if($college->college_url!='')<i class="fa fa-external-link"></i> <a target="_blank"
                                                                                                     href="{{ $college->college_url }}">{{ $college->college_url }}</a>
                                <br>@endif
                            @else
                                {{ Form::open(array('route' => 'user.request_contact', 'class'=>'form-inline')) }}
                                {{Form::button('<i class="fa fa-users"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}

                                {{ Form::hidden('entity_id', $college->college_id) }}
                                {{ Form::hidden('entity_type', 'College') }}
                                {{ Form::close() }}
                            @endif


                        </div>
                    </div>

                </div>
                {{ Form::open(array('route' => 'user.ask_question')) }}
                @include('includes/ask_questions')
                {{ Form::hidden('question_id', $college->college_id) }}
                {{ Form::hidden('question_type', 'College') }}
                {{ Form::close() }}


            </div>
        </div>
    </article>





@stop