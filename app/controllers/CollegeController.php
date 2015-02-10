<?php

class CollegeController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /college
     *
     * @return Response
     */
    public function index($id)
    {

         $college = College::where('college_id', '=', $id)
            ->with('features', 'images', 'recruiters', 'courses', 'questions')
            ->first();

        if (Auth::check())
        {
            $bookmark = Bookmark::where('user_id', '=', Auth::user()->id)
                ->where('bookmark_type', '=', 'College')
                ->where('bookmark_id', '=', $college->college_id)
                ->first();

            $contactAccess = ContactAccess::where('user_id', '=', Auth::user()->id)
                ->where('entity_type', '=', 'College')
                ->where('entity_id', '=', $college->college_id)
                ->first();
        } else
        {
            $bookmark = NULL;
            $contactAccess = NULL;
        }

        return View::make('college.index', compact('college', 'bookmark', 'contactAccess'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /college/create
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * POST /college
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /college/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /college/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /college/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /college/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}