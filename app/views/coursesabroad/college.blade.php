<?php $breadcrumb_t = $college->university_name;
$breadcrumb_p = $breadcrumb_p = General::commafy([$college->university_name, $college->city, $college->region, $college->country]);
?>
@extends('layouts.main')
@section('content')

    <article class="single-vehicle-details">
        <div class="single-vehicle-title">
            @if($college->established!='')<span
                    class="badge-premium-listing">Established: {{ $college->established }}</span>@endif
            <h2 class="post-title">{{ $college->university_name }}</h2>
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

                {{ Form::hidden('bookmark_id', $college->univ_id) }}
                {{ Form::hidden('bookmark_type', 'AbroadUniversity') }}
                {{ Form::close() }}

                {{ Form::open(array('route' => 'user.request_contact', 'class'=>'form-inline')) }}
                @if($contactAccess!==NULL)
                    {{Form::button('<i class="fa fa-check"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}
                @else
                    {{Form::button('<i class="fa fa-users"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}
                @endif
                {{ Form::hidden('entity_id', $college->univ_id) }}
                {{ Form::hidden('entity_type', 'AbroadUniversity') }}
                {{ Form::close() }}

                {{ Form::open(array('route' => 'user.request_brochure', 'class'=>'form-inline')) }}
                {{Form::button('<i class="fa fa-calendar"></i> <span>Download Brochure</span>', ['class' => 'btn btn-info btn-sm', 'type' => 'submit'])}}

                {{ Form::hidden('entity_id', $college->univ_id) }}
                {{ Form::hidden('entity_type', 'AbroadUniversity') }}
                {{ Form::close() }}

            </div>
            <div class="vehicle-cost">Type: <?php echo $college->univ_type;?></div>

        </div>
        <div class="row">
            <div class="col-md-8">

                <blockquote>
                    <p>{{ $college->university_highlights }}</p>
                </blockquote>

                @if($college->photos->count()>0)
                    <div class="single-listing-images">
                        <div class="additional-images">
                            <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes"
                                data-single-item="no" data-items-desktop="4" data-items-desktop-small="4"
                                data-items-tablet="3" data-items-mobile="3">
                                @foreach($college->photos as $image)
                                    <li class="item format-image"><a
                                                href="{{ General::file_url('college_images_abroad') . $image->file_name }}"
                                                data-rel="prettyPhoto[gallery]" class="media-box"><img
                                                    src="{{ General::file_url('college_images_abroad') . $image->file_name }}"
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
                    @if($course->has_detail==1)
                        <tr>
                            <td><a class="link"
                                   href="{{ route('courses.abroad.detail',['id'=>$course->course_id,'country'=>$college->country,'slug'=>Str::slug($course->course_name)]); }}">{{ $course->course_name  }}</a>
                            </td>
                            <td> {{ $course->course_duration  }}</td>

                        </tr>
                    @endif
                    <?php }?>

                </table>
                <div class="spacer-50"></div>
                <div class="accordion" id="accordionArea">
                    <?php if($college->accomodation_details <> ''){ ?>
                    <div class="accordion-group panel">
                        <div class="accordion-heading accordionize"><a class="accordion-toggle active "
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordionArea" href="#3Area">
                                Accomodation <i class="fa fa-angle-down"></i> </a></div>
                        <div id="3Area" class="accordion-body in collapse">
                            <div class="accordion-inner">

                                <?php echo $college->accomodation_details; ?>
                                <?php echo General::extLink($college->accomodation_url, 'Accomodation Details '); ?>
                                <br> <br>
                                <?php if($college->cost_living <> ''){ ?>
                                <strong>Cost of Living (Monthly) in <?php echo $college->city; ?>
                                    , <?php echo $college->region; ?>
                                    :</strong> <?php echo $college->cost_living_currency; ?> <?php echo number_format($college->cost_living); ?>
                                <br>
                                <?php echo General::extLink($college->cost_living_url, 'Cost Details '); } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>


            </div>
            <!-- Vehicle Details Sidebar -->
            <div class="col-md-4 vehicle-details-sidebar sidebar">
                <div class="sidebar-widget widget">

                    <div class="vehicle-block format-standard">
                        <a class="media-box">
                            <div class="media-box-center">
                                <img src="<?php if (($college->logo_img != '') && (File::exists(General::file_url('college_logo_abroad', 'PATH') . $college->logo_img)))
                                {
                                    echo General::file_url('college_logo_abroad') . $college->logo_img;
                                } else
                                {
                                    echo asset('images/no-thumb.png');
                                }?>" alt="{{ $college->college_name }}">
                            </div>
                        </a>

                        <div class="vehicle-block-content">

                            <h4 class="vehicle-title">{{ $college->university_name }}</h4>
                            @if($college->accrediation!='')
                                <div class="vehicle-cost">Accrediation: <?php echo $college->accrediation;?></div>
                            @endif
                        </div>
                    </div>

                    <div class="spacer-50"></div>


                    <div class="panel panel-info price-suggestion">
                        <div class="panel-heading">
                            <h5 class="panel-title">Contact Info</h5>
                        </div>
                        <div class="panel-body">
                            <i class="fa fa-building-o"></i> <b>{{ $college->university_name }}</b><br>
                            {{ $college->address }}<br><br>

                            @if($contactAccess!==NULL)
                                @if($college->contact_no!='')<i class="fa fa-phone"></i>
                                <b>{{ $college->contact_no }}</b><br>@endif

                                @if($college->email!='')<i class="fa fa-envelope"></i> <a
                                        href="mailto:{{ $college->email }}">{{ $college->email }}</a><br>@endif

                                @if($college->url!='')<i class="fa fa-external-link"></i> <a target="_blank"
                                                                                             href="{{ $college->url }}">{{ str_limit($college->url,40) }}</a>
                                <br>@endif
                                @if($college->intl_website!='')<i class="fa fa-external-link"></i> <a target="_blank"
                                                                                                      href="{{ $college->intl_website }}">{{ str_limit($college->intl_website,40) }}</a>
                                <br>@endif
                            @else
                                {{ Form::open(array('route' => 'user.request_contact', 'class'=>'form-inline')) }}

                                {{Form::button('<i class="fa fa-users"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}

                                {{ Form::hidden('entity_id', $college->univ_id) }}
                                {{ Form::hidden('entity_type', 'AbroadUniversity') }}
                                {{ Form::close() }}
                            @endif
                        </div>
                    </div>


                    @foreach($college->campuses as $campus)
                        <div class="panel panel-info price-suggestion">
                            <div class="panel-heading">
                                <h5 class="panel-title">{{ $campus->campus_name  }}</h5>
                            </div>
                            <div class="panel-body">
                                <i class="fa fa-building-o"></i>
                                {{ $campus->address }}<br><br>


                                @if($campus->email!='')<i class="fa fa-envelope"></i> <a
                                        href="mailto:{{ $campus->email }}">{{ $campus->email }}</a><br>@endif

                                @if($campus->url!='')<i class="fa fa-external-link"></i> <a target="_blank"
                                                                                            href="{{ $campus->url }}">{{ str_limit($campus->url,40) }}</a>
                                <br>@endif

                            </div>
                        </div>
                    @endforeach
                </div>
                {{ Form::open(array('route' => 'user.ask_question')) }}
                @include('includes/ask_questions')
                {{ Form::hidden('question_id', $college->univ_id) }}
                {{ Form::hidden('question_type', 'AbroadUniversity') }}
                {{ Form::close() }}


            </div>
        </div>
    </article>





@stop