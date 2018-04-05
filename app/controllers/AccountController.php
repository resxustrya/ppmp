
<?php

class AccountController extends BaseController
{
    

    public function login()
    {

        if(Request::method() == "GET")
        {
            
            if(Auth::check()) {
                return Redirect::to('ppmp/section');
            }
            Session::forget('rexus');
            return View::make('login.login');
        }
        if(Request::method() == "POST")
        {
            $username = Input::get('username');
            $password = Input::get('password');

            if (Auth::attempt(array('username' => $username, 'password' => $password)))
            {
               if(! Auth::check())
               {
                   Session::flush();
                   return Redirect::to('/')->with('ops','Invalid Login');
               } else {
                  if(Auth::user()->user_priv == '0'){
                       return Redirect::to('ppmp/section');
                   }else if(Auth::user()->user_priv == '1111') {
                       return Redirect::to('ppmp/division');
                   }else if(Auth::user()->user_priv == '8888') {
                       return Redirect::to('supply');
                   }
               }
            } else {
                Session::flush();
                return Redirect::to('login')->with('ops','Invalid Login');
            }
        }
    }

    public function code()
    {
        if(Request::method() == "GET")
        {
            Session::forget('rexus');
            return View::make('login.code');
        }
        if(Request::method() == "POST")
        {
            $code = Input::get('passcode');
            
            if($code != "rexus")
            {
                return Redirect::to('assets')->with('ops','Invalid code');
            } else {
                Session::put('rexus','rexus');
                return Redirect::to('assets/menu');
            }
        }
    }
    public function asset_menu()
    {
        if(Session::has('rexus') AND Session::get('rexus') == 'rexus') {
            return View::make('admin.assets.menu');
        } else {
            return Redirect::to('assets');
        }
    }
    public function register()
    {
        if(!Session::has('code')) {
            return Redirect::to('enter/code');
        }
        if(Request::method() == "GET")
        {
            return View::make('login.register.register');
        }
        if(Request::method() == "POST")
        {
            $data['username'] = Input::get('username');
            $data['fname'] = Input::get('fname');
            $data['lname'] = Input::get('lname');
            $data['section'] = Input::get('section');
            $data['user_priv'] = Input::get('level');
            $data['password'] = Hash::make(Input::get('username'));
            DB::table('users')->insert($data);

            return Redirect::to('assets')->with('ops','New user account was added.');
        }
    }

    public function reset_pass()
    {
        if(Request::method() == "GET")
        {
            return View::make('login.reset');
        }
        if(Request::method() == "POST")
        {
            $user = User::where('username', '=', Input::get('username'))->first();
            if(isset($user) and count($user) > 0) {
                $user->password = Hash::make('123');
                $user->save();
                return Redirect::to('login')->with('ops', 'Password was reset to 123 for user : '. $user->fname . ' ' .$user->lname);
            } else {
                return Redirect::to('login')->with('ops', 'Username not found');
            }
        }
    }

}

?>