@extends('layouts.main')
<?php
$breadcrumb_t = 'Q&amp;A';
?>
@section('content')

    <div class="row">

        <h3>Please choose a Password</h3>

        @foreach($questions as $question)
            {{ $question->question_text }}<br>
            @if($question->question_type=='Course')
<?php
                $course = Course::find($question->question_id);
                    print_r($course);
                ?>
            @endif
        @endforeach
    </div>
@stop