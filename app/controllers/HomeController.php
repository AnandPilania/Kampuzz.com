<?php

class HomeController extends BaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{

		$colleges = College::with('courses')->orderBy(DB::raw('RAND()'))->take(8)->get();
		$articles = Article::with('categories')->orderBy('created_at','DESC')->take(6)->get();
		$testimonials = Testimonial::orderBy('created_at','DESC')->take(3)->get();
		$exams = Exam::where('is_active',1)->take(6)->get();
		return View::make('home.home',compact('exams','testimonials','articles','colleges'));
	}


}
