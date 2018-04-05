<?php




class AdminController extends BaseController
{
    public function __construct()
    {
        if(! Session::has('rexus')) {
            return Redirect::to('assets');
        }
    }
    
    public function view_divisions() {
        return View::make('admin.assets.divisions');
    }

    public function add_division()
    {
        if(Request::method() == "GET") {
            return View::make('admin.assets.add_division');
        }
        if(Request::method() == "POST") {
            $data['description'] = Input::get('division');
            $data['head'] = Input::get('head');
            DB::table('division')->insert($data);
            return Redirect::to('view/division');
        }
    }
    public function edit_division()
    {
        if(Request::method() == "GET") {
            $id = Input::get('division');
            Session::put('division_id',$id);
            $division = DB::table('division')->where('id','=', $id)->first();
            return View::make('admin.assets.edit_division',['division' => $division]);
        }
        if(Request::method() == "POST") {
            if(Session::has('division_id')) {
                $id = Session::get('division_id');
                $data['description'] = Input::get('division');
                $data['head'] = Input::get('head');
                DB::table('division')->where('id','=',$id)->update($data);
                return Redirect::to('view/division');
            }
        }
    }
    public function view_sections()
    {
        $sections = DB::table('section')->orderBy('description','ASC')->paginate(20);
        return View::make('admin.assets.view_sections',['sections' => $sections]);
    }

    public function add_section()
    {
        if(Request::method() == "GET") {
            return View::make('admin.assets.add_section');
        }
        if(Request::method() == "POST") {
            $data['short'] = Input::get('short');
            $data['division'] = Input::get('division');
            $data['description'] = Input::get('section');
            $data['head'] = Input::get('head');
            DB::table('section')->insert($data);
            return Redirect::to('view/sections');
        }
    }

    public function edit_section()
    {
        if(Request::method() == "GET") {
            $id = Input::get('section');
            Session::put('section_id',$id);
            $section = DB::table('section')->where('id','=',$id)->first();
            return View::make('admin.assets.edit_section',['section' => $section]);
        }
        if(Request::method() == "POST") {
            if(Session::has('section_id')) {
                $data['short'] = Input::get('short');
                $data['division'] = Input::get('division');
                $data['description'] = Input::get('section');
                $data['head'] = Input::get('head');
                $id = Session::get('section_id');
                DB::table('section')->where('id','=',$id)->update($data);
                return Redirect::to('view/sections');
            }
        }
    }

    public function remove_section()
    {
        $id = Input::get('section');
        DB::table('section')->where('id','=',$id)->delete();
        return Redirect::to('view/sections');
    }

    public function view_users()
    {
        $users = DB::table('users')->orderBy('fname','ASC')->paginate(20);
        return View::make('admin.assets.view_users',['users' => $users]);
    }

    public function edit_user()
    {
        
        if(Request::method() == "GET") {
            $id = Input::get('id');
            Session::put('userid',$id);
            
            $user = DB::table('users')->where('id','=',$id)->first();
            
            return View::make('admin.assets.edit_user',['user' => $user]);
        }
        if(Request::method() == "POST") {
            if(Session::has('userid')) {
                
                $data['fname'] = Input::get('fname');
                $data['lname'] = Input::get('lname');
                $data['username'] = Input::get('username');
                $data['password'] = Hash::make(Input::get('username'));
                $data['division'] = Input::get('division');
                $data['section'] = Input::get('section');
                $data['user_priv'] = Input::get('user_type');
                
                $id = Session::get('userid');
                DB::table('users')->where('id','=',$id)->update($data);
                return Redirect::to('view/users');
            }
        }
    }
    public function remove_user()
    {
        $id = Input::get('id');
        DB::table('users')->where('id','=',$id)->delete();
        return Redirect::to('view/users');
    }

    public function add_user()
    {
        if(Request::method() == "GET") {
            return View::make('admin.assets.add_user');
        }
        if(Request::method() == "POST") {
            $data['fname'] = Input::get('fname');
            $data['lname'] = Input::get('lname');
            $data['division'] = Input::get('division');
            $data['section'] = Input::get('section');
            $data['username'] = Input::get('username');
            $data['password'] = Hash::make(Input::get('username'));
            $data['user_priv'] = Input::get('user_type');
            DB::table('users')->insert($data);
            return Redirect::to('view/users');
        }
    }

    public function search_user()
    {
        $key = Input::get('keyword');
        $users = DB::table('users')
                    ->where('username','LIKE',"%$key%")
                    ->orWhere('fname','LIKE', "%$key%")
                    ->orWhere("lname", 'LIKE', "$key%")
                    ->orderBy('lname','ASC')
                    ->paginate(20);
        
        return View::make('admin.assets.search_user',['users' => $users]);
    }
    
    public function search_section()
    {
        $keyword = Input::get('keyword');
        $sections = DB::table('section')->where('description','LIKE',"%$keyword%")->orWhere('short','LIKE',"%$keyword%")->paginate(20);
        return View::make('admin.assets.search_section',['sections' => $sections]);
    }
}
?>