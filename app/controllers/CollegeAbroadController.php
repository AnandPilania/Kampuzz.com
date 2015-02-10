<?php

class CollegeAbroadController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /courses/abroad
     *
     * @return Response
     */

    public function index($id)
    {

        $college = AbroadUniversity::where('univ_id', '=', $id)
           ->with('courses')
           ->with('campuses')
            ->with('photos')
            ->firstOrFail();

        if (Auth::check())
        {
            $bookmark = Bookmark::where('user_id', '=', Auth::user()->id)
                ->where('bookmark_type', '=', 'AbroadUniversity')
                ->where('bookmark_id', '=', $college->univ_id)
                ->first();

            $contactAccess = ContactAccess::where('user_id', '=', Auth::user()->id)
                ->where('entity_type', '=', 'AbroadUniversity')
                ->where('entity_id', '=', $college->univ_id)
                ->first();
        } else
        {
            $bookmark = NULL;
            $contactAccess = NULL;
        }

        return View::make('coursesabroad.college', compact('college', 'bookmark', 'contactAccess'));

    }


}