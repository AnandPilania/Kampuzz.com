<?php

class BaseController extends Controller {
    /**
     * Set sharable view vars using constructor. Inheriting class must extend constructor.
     */
    public function __construct() {
        $this->beforeFilter(function() {
            View::share('menu', MenuHelper::getMenuHTML());
        });
    }


    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

}
