<?php $breadcrumb_t = $product->product_name; ?>
@extends('layouts.main')
@section('content')
    <article class="single-vehicle-details">
        <div class="single-vehicle-title">

            <h2 class="post-title">{{ $product->product_name }}</h2>
        </div>

        <div class="row">
            <div class="col-md-9">

                @if (($product->product_image != '') &&(File::exists(General::file_url('uploads','PATH').$product->product_image)))


                    <div class="dealer-prosite"><div class="dealer-avatar">
                            <img src="<?php
                            echo General::file_url('uploads') . $product->product_image;
                            ?>" alt=""></div></div>

                    <div class="spacer-50"></div>
                @endif

                @if($product->product_intro!='')
                    <blockquote style="margin-top: 0px">
                        <p>{{ $product->product_intro }}</p>
                    </blockquote>
                @endif
                    @if (($product->product_file_name != '') &&(File::exists(General::file_url('files','PATH').$product->product_file_name)))
                        <a href="{{ General::file_url('files') . $product->product_file_name }}" class="btn btn-danger" title="Download"><i class="fa fa-file-text-o"></i> <span>Download</span></a>
                        <div class="spacer-50"></div>
                    @endif

                    {{ $product->product_description }}

            </div>
            <!-- Vehicle Details Sidebar -->
            <div class="col-md-3 sidebar">

                <div class="spacer-50"></div>
                <div class="widget sidebar-widget widget_categories">
                    <h3 class="widgettitle">Product Categories</h3>
                    <ul>
                        @foreach($productCat as $cat)
                            @if($cat->products->count()>0)
                        <li><a href="{{ route('products.category',['id'=>$cat->id,'slug'=>Str::slug($cat->category_name)]) }}"><i class="fa fa-angle-right"></i> {{ $cat->category_name }}</a> ({{ $cat->products->count() }})</li>
                        @endif
                                @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </article>
@stop