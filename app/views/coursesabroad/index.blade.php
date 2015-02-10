@extends('layouts.main')
<?php if ($course_name)
{
    $breadcrumb_t = $course_name->course_name;
    $breadcrumb_p = 'Study in ' . $country;
} ?>

@section('content')

    <div class="row">
        <!-- Search Filters -->
        <div class="col-md-3 search-filters" id="Search-Filters">
            <div class="tbsticky filters-sidebar">
                <h3>Refine Search</h3>
                <div class="accordion" id="toggleArea">

                </div>
                <!-- End Toggle -->

            </div>
        </div>

        <!-- Listing Results -->
        <div class="col-md-9 results-container">
            <div class="results-container-in">
                <div class="waiting" style="display:none;">
                    <div class="spinner">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>
                    </div>
                </div>
                <div id="results-holder" class="results-list-view">
                    @foreach($courses as $course)
                        <?php
                        if($course->eligibility){$eligibility = $course->eligibility->toArray();}
                        $detail_url = route('courses.abroad.detail', ['slug' => Str::slug($course->university_name . '-' . $course->course_name), 'id' => $course->course_id, 'country' => $course->country]);
                        ?>
                        <!-- Result Item -->
                        <div class="result-item format-standard">
                            <div class="result-item-image">
                                <a href="{{ $detail_url }}" class="media-box">
                                    <div class="media-box-center">
                                        <img src="<?php if (($course->logo_img <> '')&&(File::exists(General::file_url('college_logo_abroad', 'PATH') . $course->logo_img)))
                                        {
                                            echo General::file_url('college_logo_abroad') . $course->logo_img;
                                        } else
                                        {
                                            echo asset('images/no-thumb.png');
                                        }?>" alt=""></div></a>

                            </div>
                            <div class="result-item-in">
                                <h4 class="result-item-title"><a href="{{ $detail_url }}">{{ $course->course_name }}</a></h4>
                                <div class="result-item-cont">
                                    <div class="result-item-block col1">
                                        <p><?php
                                            $str = array();
                                            $str[] = $course->course_type;
                                            $str[] = $course->specialization;
                                            echo General::commafy($str); ?></p>
                                        <p><?php
                                            $str = array();
                                            $str[] = $course->university_name;
                                            $str[] = $course->city;
                                            $str[] = $course->region;
                                            $str[] = $course->country;
                                            echo General::commafy($str); ?></p>

                                    </div>
                                    <div class="result-item-block col2">
                                        <div class="result-item-pricing">
                                            1st Year Fee
                                            <div class="price">{{ $course->fees_lakh_inr }} Lacs</div>
                                        </div>
                                        <div class="result-item-action-buttons">
                                            <a href="{{ $detail_url }}" class="btn btn-default btn-sm"><i class="fa fa-star-o"></i> Details</a><br>

                                        </div>
                                    </div>
                                </div>
                                <div class="result-item-features">
                                    <ul class="inline">
                                        @if($course->course_duration!='')<li>Duration: {{ $course->course_duration }}</li>@endif
                                            <?php if (isset($eligibility[0]['exam_name']))
                                            {
                                                echo '<li>Exam: ' . substr($eligibility[0]['exam_name'], 0, 100) . ' - Cut Off: ' . $eligibility[0]['cut_off_marks'] . '</li>';
                                            } ?>
                                          @if($course->affiliation!='')<li>Affiliation: {{ strip_tags($course->affiliation) }}</li>@endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $courses->links() }}
                </div>

            </div>
        </div>



    </div>


@stop