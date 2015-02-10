<div class="col-sm-4 col-md-4">
    <div class="thumbnail">
        <img style="max-width: 100px" src="<?php if (($product->product_image != '') && (File::exists(General::file_url('uploads', 'PATH') . $product->product_image)))
        {
            echo General::file_url('uploads') . $product->product_image;
        } else
        {
            echo asset('images/no-thumb.png');
        }?>" alt="{{ $product->product_name }}">
        <div class="caption">
            <h4>{{ $product->product_name }}</h4>
            <p>{{ $product->product_intro }}</p>
            <p><a href="{{ route('products.detail',['id'=>$product->id, 'slug'=>Str::slug($product->product_name)]) }}" class="btn btn-primary" role="button">View Details</a></p>
        </div>
    </div>
</div>