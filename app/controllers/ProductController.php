<?php

class ProductController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $products = Product::with('categories')->get()->toArray();

        return View::make('exam.index', compact('exam'));
    }


    public function detail($id)
    {

        $productCat = ProductCategory::with('products')->get();
        $product = Product::where('id', $id)->with('categories')->first();

        return View::make('products.detail', compact('product', 'productCat'));
    }

    public function category($id)
    {
        return $products = Product::whereHas('categories', function ($query) use ($id)
        {
            $query->where('product_category_id', $id);
        })->take(10)->get()->toArray();

        return View::make('exam.index', compact('exam'));
    }

    public function categorylist()
    {
        return $categories = ProductCategory::get()->toArray();
    }

}
