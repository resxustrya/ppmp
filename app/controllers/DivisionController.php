<?php

class DivisionController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('division');
    }

    public function index()
    {
        return View::make('division.consolidate');
    }   

    public function source_fund()
    {
        if(Request::method() == "GET"){
            return View::make('division.source_fund');
        }
        if(Request::method() == "POST") {
            DB::table('division')->where('id','=', Auth::user()->division)->update(['source_fund' => Input::get('source_fund')]);
            return Redirect::to('ppmp/division');
        }
    }
}
?>