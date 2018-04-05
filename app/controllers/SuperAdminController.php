<?php

/**
 * Created by PhpStorm.
 * User: hahahehe
 * Date: 8/17/2017
 * Time: 3:13 PM
 */
class SuperAdminController extends BaseController
{
    public function __construct()
    {
        $this->beforeFilter('superadmin');
    }

    public function home()
    {
        return View::make('admin.home');
    }

    public function sections()
    {
        $section = DB::table('section')->orderBy('description', 'ASC')->paginate(20);
        return View::make('admin.sections.section',['sections' => $section]);
    }

    public function section_users($id)
    {
        $users = User::where('section','=', $id)->orderBy('fname','ASC')->paginate(20);
        Session::put('section_id',$id);
        $data['search'] = "s/search/users";
        $data['users'] = $users;
        $data['section'] = $id;
        return View::make('admin.users.users',$data);
    }

    public function search()
    {
        Session::put('q', Input::get('q'));
        $users = DB::table('users')
                ->where('section','=', Session::get('section_id'))
                ->where(function($query){
                    $query->where('fname','LIKE', "%". Session::get('q')."%")
                            ->where('lname','LIKE',"%". Session::get('q')."%")
                            ->where('username', 'LIKE', "%". Session::get('q')."%");
                })->paginate(20);
        return $users;
    }

    public function edituser()
    {
        if(Request::method() == "GET")
        {
            Session::put('edit_id',Input::get('id'));
            $user = DB::table('users')->where('username','=', Session::get('edit_id'))->first();
            return View::make('admin.users.edit',['user' => $user]);
        }

        if(Request::method() == "POST")
        {
            $data['username'] = Input::get('username');
            $data['fname'] = Input::get('fname');
            $data['lname'] = Input::get('lname');
            $data['user_priv'] = Input::get('level');
            DB::table('users')->where('username',Session::get('edit_id'))->update($data);
            return Redirect::to('super/admin');
        }
    }
}