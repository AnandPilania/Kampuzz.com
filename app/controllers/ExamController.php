<?php

class ExamController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $categories = ExamCategory::with('exams')->get();

        return View::make('exam.index', compact('categories'));
    }


    public function detail($id)
    {
        $exam = Exam::where('id', $id)->with('examdates', 'categories', 'tags.articles', 'tags.products')->first();
        if (Auth::check())
        {
            $bookmark = Bookmark::where('user_id', '=', Auth::user()->id)
                ->where('bookmark_type', '=', 'Exam')
                ->where('bookmark_id', '=', $exam->id)
                ->first();

        } else
        {
            $bookmark = NULL;
        }
        return View::make('exam.detail', compact('exam','bookmark'));
    }

    public function category($id)
    {
        $category = ExamCategory::find($id);
        $exams = Exam::whereHas('categories', function ($query) use ($id)
        {
            $query->where('exam_category_id', $id);
        })->take(10)->get();

        return View::make('exam.exams', compact('exams', 'category'));
    }

    public function categorylist()
    {
        return $categories = ExamCategory::get()->toArray();
    }


}
