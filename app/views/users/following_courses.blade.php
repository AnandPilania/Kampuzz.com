@extends('layouts.main')
<?php
$breadcrumb_t = 'Courses';
?>
@section('content')
    <div class="dashboard-wrapper">
        <div class="row">
            @include('includes.dashboard_sidebar')
            <div class="col-md-9 col-sm-8">

                <div class="dashboard-block">
                    <div class="dashboard-block-head">


                        <h3>My Favourite Courses</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered dashboard-tables saved-cars-table">
                            <thead>
                            <tr>
                                <td>Name</td>
                                <td width="100px">Added</td>
                                <td width="100px">Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookmarks as $bookmark)
                                <?php
                                if($bookmark->bookmark_type=='Course'){
                                    $course = Course::find($bookmark->bookmark_id);
                                    $course_name = $course->course_name . ', ' .  $course->college->college_name . ', ' . $course->college->city_name;
                                    $detail_url = route('courses.detail',['id'=>$course->course_id,'slug'=>Str::slug($course->course_name)]);
                                } else {
                                    $course = AbroadCourse::find($bookmark->bookmark_id);
                                    $course_name = $course->course_name . ', ' . $course->university->university_name . ', ' . $course->university->country;
                                    $detail_url = route('courses.abroad.detail',['id'=>$course->course_id,'country'=>$course->university->country,'slug'=>Str::slug($course->course_name)]);
                                  } ?>


                                <tr>
                                    <td>
                                        <a href="{{ $detail_url }}">{{ $course_name }}</a>
                                    </td>

                                    <td><span class="text-success">{{ $bookmark->created_at->diffForHumans() }}</td>
                                    <td align="center">
                                        {{ Form::open(array('route' => 'user.deleteBookmark','method' => 'delete', 'class'=>'form-inline')) }}
                                        {{Form::button('<i class="fa fa-check"></i> <span>Follow</span>', ['class' => 'btn btn-primary btn-sm', 'type' => 'submit'])}}

                                        {{ Form::hidden('id', $bookmark->id) }}
                                        {{ Form::close() }}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>



            </div>
        </div>
    </div>
@stop