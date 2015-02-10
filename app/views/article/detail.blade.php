@extends('layouts.main')
<?php

    $breadcrumb_t = $article->article_title;
 ?>

@section('content')

    <div class="row">
        <div class="col-md-9 ">
            <div class="rich_editor_text"></div>
            <div class="element_size_100">

                
                <div class="event eventlisting">

                    {{ $article->article_content }}


                </div>



            </div>
        </div>


    </div>
    <!-- Row End -->


@stop