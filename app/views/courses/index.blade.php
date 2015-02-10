@extends('layouts.main')
<?php if ($course_name)
{
    $breadcrumb_t = $course_name->course_name;
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
                            @foreach($courseColleges as $course)
                            <?php
            
                    $detail_url = route('courses.detail', ['slug' => Str::slug($course->college->college_name . '-' . $course->course_name), 'id' => $course->course_id]);
                    ?>
                                <!-- Result Item -->
                                <div class="result-item format-standard">
                                    <div class="result-item-image">
                                        <a href="{{ $detail_url }}" class="media-box">
<div class="media-box-center">
                                        <img src="<?php if (($course->college->college_logo_img <> '')&&(File::exists(General::file_url('college_logo', 'PATH') . $course->college->college_logo_img)))
                            {
                                echo General::file_url('college_logo') . $course->college->college_logo_img;
                            } else
                            {
                                echo asset('images/no-thumb.png');
                            }?>" alt=""></div></a>
                                        
                                    </div>
                                    <div class="result-item-in">
                                        <h4 class="result-item-title"><a href="{{ $detail_url }}">{{ $course->course_name }}</a></h4>
                                        <div class="result-item-cont">
                                            <div class="result-item-block col1">
                                            <p>{{ $course->college->college_name }}, {{ $course->college->city_name }}</p>
                                            </div>
                                            <div class="result-item-block col2">
                                                <div class="result-item-pricing">
                                                    <div class="price">{{ General::giveStars($course->college->college_rating) }}</div>
                                                </div>
                                                <div class="result-item-action-buttons">
                                                    <a href="{{ $detail_url }}" class="btn btn-default btn-sm"><i class="fa fa-star-o"></i> Details</a><br>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="result-item-features">
                                            <ul class="inline">
                                                @if($course->detail->course_duration!='')<li>Duration: {{ $course->detail->course_duration }}</li>@endif 
                                                @if($course->detail->total_fee!='')<li>Fee: <i class="fa fa-inr"></i>{{ $course->detail->total_fee }}</li>@endif
                                                @if($course->detail->affiliation!='')<li>Affiliation: {{ strip_tags($course->detail->affiliation) }}</li>@endif 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{ $courseColleges->links() }}
                            </div>

                        </div>
                    </div>


                    
                </div>    


@stop