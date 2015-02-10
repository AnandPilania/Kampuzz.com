<?php $breadcrumb_t = 'Exams'; ?>
@extends('layouts.main')
@section('content')
    @foreach ($categories as $cat)
        @if($cat->exams->count()>0)
        <div class="col-sm-4 col-md-4">
            <div class="thumbnail">
                <img style="max-width: 100px" src="<?php if (($cat->logo_file_name != '') && (File::exists(General::file_url('uploads', 'PATH') . $cat->logo_file_name)))
                {
                    echo General::file_url('uploads') . $cat->logo_file_name;
                } else
                {
                    echo asset('images/no-thumb.png');
                }?>" alt="{{ $cat->category_name }}">
                <div class="caption">
                    <h4>{{ $cat->category_name }}</h4>
                    <p><a href="{{ route('exam.category',['id'=>$cat->id, 'slug'=>Str::slug($cat->category_name)]) }}" class="btn btn-primary" role="button">View Exams</a></p>
                </div>
            </div>
        </div>
        @endif
    @endforeach
@stop