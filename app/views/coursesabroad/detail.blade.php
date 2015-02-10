@extends('layouts.main')
<?php
$breadcrumb_t = $course['course_name'];
$breadcrumb_p = General::commafy([$course['university']['university_name'], $course['university']['city'], $course['university']['region'], $course['university']['country']]);
?>

@section('content')
    <article class="single-vehicle-details">
        <div class="single-vehicle-title">

            <h2 class="post-title">{{ $course['course_name'] }}</h2>
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

                {{ Form::hidden('bookmark_id', $course['course_id']) }}
                {{ Form::hidden('bookmark_type', 'AbroadCourse') }}
                {{ Form::close() }}

                {{ Form::open(array('route' => 'user.request_contact', 'class'=>'form-inline')) }}
                @if($contactAccess!==NULL)
                    {{Form::button('<i class="fa fa-check"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}
                @else
                    {{Form::button('<i class="fa fa-users"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}
                @endif
                {{ Form::hidden('entity_id', $course['university']['univ_id']) }}
                {{ Form::hidden('entity_type', 'AbroadUniversity') }}
                {{ Form::close() }}

                {{ Form::open(array('route' => 'user.request_brochure', 'class'=>'form-inline')) }}
                {{Form::button('<i class="fa fa-calendar"></i> <span>Download Brochure</span>', ['class' => 'btn btn-info btn-sm', 'type' => 'submit'])}}

                {{ Form::hidden('entity_id', $course['university']['univ_id']) }}
                {{ Form::hidden('entity_type', 'AbroadUniversity') }}
                {{ Form::close() }}

            </div>
        </div>
        <div class="row">
            <div class="col-md-8">

                <div>

                    <div class="points-review">
                        <div class="row">
                            <div class="col-md-12">
                                @if($course['course_duration']!='')
                                    <div class="review-point">
                                        <i class="fa fa-clock-o"></i> <strong>Course Duration</strong>

                                        <div class="course-description-container">
                                            {{ $course['course_duration'] }}
                                        </div>
                                    </div>
                                @endif

                                @if  (isset($course['eligibility'][0]['exam_name']))
                                    <div class="review-point">
                                        <i class="fa fa-qrcode"></i> <strong>Exam Required</strong>

                                        <div class="course-description-container">
                                            {{ substr($course['eligibility'][0]['exam_name'], 0, 100) }}
                                        </div>
                                    </div>
                                @endif

                                @if($course['fees_lakh_inr']!='')
                                    <div class="review-point">
                                        <i class="fa fa-money"></i> <strong>1st Year Fee</strong>

                                        <div class="course-description-container">
                                            <i class="fa fa-inr"></i> {{ $course['fees_lakh_inr'] }} Lacs
                                        </div>
                                    </div>
                                @endif

                                @if($course['university']['affiliation']!='')
                                    <div class="review-point">
                                        <i class="fa fa-paperclip"></i> <strong>Affiliation</strong>

                                        <div class="course-description-container">
                                            {{ strip_tags($course['university']['affiliation']) }}
                                        </div>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="spacer-50"></div>
                @if(count($course['university']['photos'])>0)
                    <div class="single-listing-images">
                        <div class="additional-images">
                            <ul class="owl-carousel" data-columns="4" data-pagination="no" data-arrows="yes"
                                data-single-item="no" data-items-desktop="4" data-items-desktop-small="4"
                                data-items-tablet="3" data-items-mobile="3">
                                @foreach($course['university']['photos'] as $image)
                                    <li class="item format-image"><a
                                                href="{{ General::file_url('college_images_abroad') . $image['file_name'] }}"
                                                data-rel="prettyPhoto[gallery]" class="media-box"><img
                                                    src="{{ General::file_url('college_images_abroad') . $image['file_name'] }}"
                                                    alt=""></a></li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="spacer-50"></div>
                <div class="accordion" id="accordionArea">

                    <div class="accordion-group panel">
                        <div class="accordion-heading accordionize"><a class="accordion-toggle active "
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordionArea" href="#1Area">
                                Overview <i class="fa fa-angle-down"></i> </a></div>
                        <div id="1Area" class="accordion-body in collapse">
                            <div class="accordion-inner"> <?php echo $course['description'];?></div>
                        </div>
                    </div>

                    <div class="accordion-group panel">
                        <div class="accordion-heading accordionize"><a class="accordion-toggle "
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordionArea" href="#2Area">
                                Eligibility <i class="fa fa-angle-down"></i> </a></div>
                        <div id="2Area" class="accordion-body collapse">
                            <div class="accordion-inner">

                                <strong>Eligibity Criteia for this
                                    Course:</strong>

                                <table class='table table-striped'>
                                    <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>Exam Name</th>
                                        <th>Cutoff</th>
                                        <th>Max</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php for($i = 0;$i < count($course['eligibility']);$i++){?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $course['eligibility'][$i]['exam_name']; ?></td>
                                        <td><?php echo $course['eligibility'][$i]['cut_off_marks']; ?></td>
                                        <td><?php echo $course['eligibility'][$i]['max_marks']; ?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <br>
                                <?php if($course['course_eligibility_additional_info'] <> ''){ ?>
                                <strong>Important: </strong> <?php echo $course['course_eligibility_additional_info']; ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php if($course['university']['accomodation_details'] <> ''){ ?>
                    <div class="accordion-group panel">
                        <div class="accordion-heading accordionize"><a class="accordion-toggle "
                                                                       data-toggle="collapse"
                                                                       data-parent="#accordionArea" href="#3Area">
                                Accomodation <i class="fa fa-angle-down"></i> </a></div>
                        <div id="3Area" class="accordion-body  collapse">
                            <div class="accordion-inner">

                                <?php echo $course['university']['accomodation_details']; ?>
                                <?php echo General::extLink($course['university']['accomodation_url'], 'Accomodation Details '); ?>
                                <br> <br>
                                <?php if($course['university']['cost_living'] <> ''){ ?>
                                <strong>Cost of Living (Monthly) in <?php echo $course['university']['city']; ?>
                                    , <?php echo $course['university']['region']; ?>
                                    :</strong> <?php echo $course['university']['cost_living_currency']; ?> <?php echo number_format($course['university']['cost_living']); ?>
                                <br>
                                <?php echo General::extLink($course['university']['cost_living_url'], 'Cost Details '); } ?>
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
                                <img src="<?php if (($course['university']['logo_img'] <> '')&&(File::exists(General::file_url('college_logo_abroad', 'PATH') . $course['university']['logo_img'])))
                                {
                                    echo General::file_url('college_logo_abroad') . $course['university']['logo_img'];
                                } else
                                {
                                    echo asset('images/no-thumb.png');
                                }?>" alt="{{ $course['university']['university_name'] }}">
                            </div>
                        </a>

                        <div class="vehicle-block-content">

                            <h4 class="vehicle-title">{{ $course['university']['university_name'] }}</h4>

                        </div>
                    </div>

                    <div class="spacer-50"></div>
                    <a href="{{ route('college.abroad',[
                    'id'=>$course['university']['univ_id'],
                    'slug'=>Str::slug($course['university']['university_name'].'-'. $course['university']['city'].'-'. $course['university']['region'].'-'. $course['university']['country'])
                    ]) }}"
                       class="btn btn-info" title="All Courses"><i class="fa fa-file-text-o"></i> <span>All Courses in this Institute</span></a>

                    <div class="spacer-50"></div>

                    <div class="panel panel-info price-suggestion">
                        <div class="panel-heading">
                            <h5 class="panel-title">Contact Info</h5>
                        </div>
                        <div class="panel-body">
                            <i class="fa fa-building-o"></i> <b>{{ $course['university']['university_name'] }}</b><br>
                            {{ $course['university']['address'] }}<br><br>

                            @if($contactAccess!==NULL)
                                @if($course['university']['contact_no']!='')<i class="fa fa-phone"></i>
                                <b>{{ $course['university']['contact_no'] }}</b><br>@endif

                                @if($course['university']['email']!='')<i class="fa fa-envelope"></i> <a
                                        href="mailto:{{ $course['university']['email'] }}">{{ $course['university']['email'] }}</a><br>@endif

                                @if($course['university']['url']!='')<i class="fa fa-external-link"></i> <a target="_blank"
                                                                                             href="{{ $course['university']['url'] }}">{{ str_limit($course['university']['url'],40) }}</a>
                                <br>@endif
                                @if($course['university']['intl_website']!='')<i class="fa fa-external-link"></i> <a target="_blank"
                                                                                                      href="{{ $course['university']['intl_website'] }}">{{ str_limit($course['university']['intl_website'],40) }}</a>
                                <br>@endif
                            @else
                                {{ Form::open(array('route' => 'user.request_contact', 'class'=>'form-inline')) }}

                                {{Form::button('<i class="fa fa-users"></i> <span>Request Contact Info</span>', ['class' => 'btn btn-warning btn-sm', 'type' => 'submit'])}}

                                {{ Form::hidden('entity_id', $course['university']['univ_id']) }}
                                {{ Form::hidden('entity_type', 'AbroadUniversity') }}
                                {{ Form::close() }}
                            @endif
                        </div>
                    </div>

                </div>
                {{ Form::open(array('route' => 'user.ask_question')) }}
                @include('includes/ask_questions')
                {{ Form::hidden('question_id', $course['university']['univ_id']) }}
                {{ Form::hidden('question_type', 'AbroadUniversity') }}
                {{ Form::close() }}


            </div>
        </div>
    </article>
@stop