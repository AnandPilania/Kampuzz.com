@extends('layouts.main')
<?php
$breadcrumb_t = 'Exams';
?>
@section('content')
    <div class="dashboard-wrapper">
        <div class="row">
            @include('includes.dashboard_sidebar')
            <div class="col-md-9 col-sm-8">

                <div class="dashboard-block">
                    <div class="dashboard-block-head">


                        <h3>My Favourite Exams</h3>
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
                                $exam = Exam::find($bookmark->bookmark_id);
                                ?>
                                <tr>
                                    <td>
                                        <a href="{{ route('exam.detail',['id'=>$exam->id,'slug'=>Str::slug($exam->exam_name)]) }}">{{ $exam->exam_name }}</a>
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