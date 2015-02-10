<?php $breadcrumb_t = $category->category_name; ?>
@extends('layouts.main')
@section('content')
@foreach ($exams as $exam)
<div class="col-sm-4 col-md-4">
    <div class="thumbnail">
        <img style="max-width: 100px" src="<?php if (($exam->logo_file_name != '') && (File::exists(General::file_url('uploads', 'PATH') . $exam->logo_file_name)))
        {
            echo General::file_url('uploads') . $exam->logo_file_name;
        } else
        {
            echo asset('images/no-thumb.png');
        }?>" alt="{{ $exam->exam_name }}">
        <div class="caption">
            <h4>{{ $exam->exam_name }}</h4>
            <p>{{ $exam->exam_intro }}</p>
            <p><a href="{{ route('exam.detail',['id'=>$exam->id, 'slug'=>Str::slug($exam->exam_name)]) }}" class="btn btn-primary" role="button">View Details</a></p>
        </div>
    </div>
</div>
    @endforeach
@stop