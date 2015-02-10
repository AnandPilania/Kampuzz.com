<?php

class ArticleController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return $articles = Article::with('categories')->take(10)->get()->toArray();

        return View::make('exam.index', compact('exam'));
    }


    public function detail($id)
    {
        $article = Article::where('id', $id)->with('categories')->first();

        return View::make('article.detail', compact('article'));
    }

    public function category($id)
    {

        return $articles = Article::whereHas('categories', function ($query) use ($id)
        {
            $query->where('article_category_id', $id);
        })->take(10)->get()->toArray();

        return View::make('exam.index', compact('exam'));
    }

    public function categorylist(){
        return $categories = ArticleCategory::get()->toArray();
    }
}
