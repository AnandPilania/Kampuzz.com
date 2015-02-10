@extends('layouts.main')
<?php
$breadcrumb_t = 'Institutes';
?>
@section('content')
    <div class="dashboard-wrapper">
        <div class="row">
            @include('includes.dashboard_sidebar')
            <div class="col-md-9 col-sm-8">

                <div class="dashboard-block">
                    <div class="dashboard-block-head">


                        <h3>My Favourite Institutes</h3>
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
                                if($bookmark->bookmark_type=='College'){
                                    $institute = College::find($bookmark->bookmark_id);
                                    $institute_name = $institute->college_name . ', ' . $institute->city_name;
                                    $institute_id = $institute->college_id;
                                    $institute_logo = $institute->college_logo_img;
                                    $detail_url = route('college',['id'=>$institute_id,'slug'=>Str::slug($institute_name)]);

                                } else {
                                    $institute = AbroadUniversity::find($bookmark->bookmark_id);
                                    $institute_name = $institute->university_name . ', ' . $institute->city. ', ' . $institute->country;
                                    $institute_id = $institute->univ_id;
                                    $institute_logo = $institute->logo_img;
                                    $detail_url = route('college.abroad',['id'=>$institute_id,'slug'=>Str::slug($institute_name)]);
                                   } ?>
                            <tr>
                                <td>
                                    <a href="{{ $detail_url }}">{{ $institute_name }}</a>
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