<?php

class UserController extends \BaseController {

    public function login()
    {
        Session::put('url.intended', URL::previous());

        return View::make('users.login');
    }

    public function auth()
    {
        $data = Input::only('email', 'password');

        $validator = Validator::make($data, User::$login_rules);
        if ($validator->fails())
        {
            Flash::error('Your username/password combination was incorrect');

            return Redirect::back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt($data))
        {

            return Redirect::intended('user/dashboard');
        }
        Flash::error('Your username/password combination was incorrect');

        return Redirect::route('user.login')->withInput();
    }

    public function register()
    {
        $testimonials = Testimonial::orderBy('created_at', 'DESC')->take(3)->get();

        return View::make('users.register', compact('testimonials'));

    }

    public function store()
    {
        $data = Input::all();
        // echo "<pre>";
        // print_r($data);
        // exit();

        $validator = Validator::make($data, User::$registration_rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // check if user exists with this email ID
        if (User::where('email', Input::get('email'))->first())
        {
            Flash::error('Another User with same email exists!');

            return Redirect::back()->withInput();
        }

        $user = User::create(Input::only('name', 'email', 'verification_token', 'phone', 'pincode', 'newsletter'));
        Auth::login($user);

        // send activation email
        $activation_link = route('user.activate', ['email' => Input::get('email'), 'verification_token' => Auth::user()->verification_token]);
        Mail::send('users.email.welcome', ['name' => Input::get('name'), 'activation_link' => $activation_link], function ($message)
        {
            $message->to(Input::get('email'), Input::get('name'))->subject('Welcome to Kampuzz.com!');
        });
        Flash::success('Welcome to Kampuzz. Please check your email for account activation instructions.');
        return Redirect::intended('user/dashboard');
    }

    public function activate($email, $verification_token)
    {
        // clear any logged in User
        Auth::logout();

        $user = User::where('email', $email)
            ->where('verification_token', urldecode($verification_token))
            ->where('email_verified', 0)
            ->first();
        if ($user)
        {
            return View::make('users.set_password', compact('user'));
        } else
        {
            abort(403);
        }

    }

    public function setPassword()
    {
        $data = Input::all();

        $validator = Validator::make($data, User::$new_password_rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', Input::get('email'))
            ->where('verification_token', Input::get('verification_token'))
            ->where('email_verified', 0)
            ->firstOrFail();
        Auth::login($user);

        $user->password = Hash::make(Input::get('new_password'));
        $user->email_verified = 1;
        $user->verified_at = Carbon\Carbon::now();
        $user->save();

        Flash::success('You have successfully activated your account and setup your password');
        return Redirect::route('user.dashboard');

    }

    public function brochure()
    {
        $entity_id = Input::get('entity_id');
        $entity_type = Input::get('entity_type');
        $user_id = Auth::user()->id;
        RequestBrochure::firstOrCreate(compact('entity_id', 'entity_type', 'user_id'));
        Flash::success('We shall send the brochure to your email soon!');

        return Redirect::back();
    }


    public function contactInfo()
    {
        $entity_id = Input::get('entity_id');
        $entity_type = Input::get('entity_type');
        $user_id = Auth::user()->id;
        ContactAccess::firstOrCreate(compact('entity_id', 'entity_type', 'user_id'));
        Flash::success('You may now view the contact details for this Institution in the page below');

        return Redirect::back();
    }

    public function contacts()
    {
        //
    }

    public function saveBookmark()
    {
        $bookmark_id = Input::get('bookmark_id');
        $bookmark_type = Input::get('bookmark_type');
        $user_id = Auth::user()->id;
        Bookmark::firstOrCreate(compact('bookmark_id', 'bookmark_type', 'user_id'));

        return Redirect::back();
    }

    public function deleteBookmark()
    {
        $bookmark = Bookmark::where('id', Input::get('id'))
            ->where('user_id', Auth::user()->id)
            ->first();
        $bookmark->delete();

        return Redirect::back();
    }

    public function ask_question()
    {
        $data = Input::all();

        $validator = Validator::make($data, Question::$question_rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // check if logged in -- proceed to post question and show confirmation
        if (Auth::check())
        {
            $data['user_id'] = Auth::user()->id;
            Question::create($data);
            Flash::success('Your question has been successfully sent. Please check your dashboard for the reply.');

            return Redirect::back();

        } else
        {
            // if not logged in - try to register
            if (User::where('email', Input::get('email'))->first())
            {
                return Redirect::guest('user/login');
            }
            // try to register a User
            $this->store();
            $data['user_id'] = Auth::user()->id;
            Question::create($data);
            Flash::success('Your question has been successfully sent. Please check your dashboard for the reply.');

            return Redirect::back();


        }
    }

    public function dashboard()
    {

        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();

        return View::make('users.dashboard', compact('bookmarks'));

    }

    public function profile()
    {
        $user = Auth::user();
        return View::make('users.profile', compact('user'));

    }


    public function qna()
    {
        $questions = Question::where('user_id', Auth::user()->id)->get();
        return View::make('users.qna', compact('questions'));
    }

    public function shortlistInstitutes()
    {
       $bookmarks = Bookmark::where('user_id', Auth::user()->id)
            ->where(function ($query) {
                $query->where('bookmark_type','College')
                    ->orWhere('bookmark_type','AbroadUniversity');
            })
            ->get();

        return View::make('users.following_institutes', compact('bookmarks'));
    }

    public function shortlistCourses()
    {
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)
            ->where(function ($query) {
                $query->where('bookmark_type','Course')
                    ->orWhere('bookmark_type','AbroadCourse');
            })
            ->get();

        return View::make('users.following_courses', compact('bookmarks'));
    }

    public function shortlistExams()
    {
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)
            ->where('bookmark_type','Exam')->get();

         return View::make('users.following_exams', compact('bookmarks'));
    }



    public function update()
    {
        $user = Auth::user();
        $data = Input::all();

        $validator = Validator::make($data, User::$profile_rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if(Input::get('password')!=''){
            // validate
            $validator = Validator::make($data, User::$change_password_rules);
            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            $user->password = Hash::make(Input::get('new_password'));



        }
        $user->name = Input::get('name');
        $user->phone = Input::get('phone');
        $user->save();
        Flash::success('You have successfully updated your profile');
        return Redirect::route('user.dashboard');
    }

    public function googleLogin($action=NULL)
    {   
        if($action=='auth'){
            try
            {
                Hybrid_Endpoint::process();
            }
            catch (Exception $e){
                return Redirect::route('login');
            }
            return;

        }
        try {
        // create a HybridAuth object
        $socialAuth = new Hybrid_Auth(app_path() . '/config/google_auth.php');
        // authenticate with Google
        $provider = Hybrid_Auth::authenticate("Google");
        // fetch user profile
        $userProfile = $provider->getUserProfile();
    }
    catch(Exception $e) {
        // exception codes can be found on HybBridAuth's web site
        return $e->getMessage();
    }
     Session::put('provider', 'Google');
     if (User::where('email', $userProfile->email)->first())
        {
            Flash::error('Another User with same email exists!');

            return Redirect::back()->withInput();
        }
    else{
        $data=array();
        $verification_token= md5($userProfile->email . rand());
        $is_verified=isset($userProfile->emailVerified)?1:0;
        $email=isset($userProfile->email)?$userProfile->email:NULL;
        $name=isset($userProfile->displayName)?$userProfile->displayName:NULL;
        $data = [
                            'name' => $userProfile->displayName,
                            'email'=> $userProfile->email,
                            'verification_token' => $verification_token ,
                            'email_verified' => $is_verified
                            //'newsletter' => (string) $session->getAccessToken()
                    ] ;

        $user = User::create($data);
        Auth::login($user);
        // echo "<pre>";
        //             print_r($data['name']);
        //             exit();
        // send activation email
        $activation_link = route('user.activate', ['email' => $data['email'], 'verification_token' => Auth::user()->verification_token]);
        Mail::send('users.email.welcome', ['name' => $data['name'], 'activation_link' => $activation_link], function ($message) use ($email,$name)
        {
            $message->to($email, $name)->subject('Welcome to Kampuzz.com!');
        });
        Flash::success('Welcome to Kampuzz. Please check your email for account activation instructions.');
        return Redirect::intended('user/dashboard');

    }
    
        
    }
    public function facebookLogin($action=NULL)
    {   
        if($action=='auth'){
            try
            {
                Hybrid_Endpoint::process();
            }
            catch (Exception $e){
                return Redirect::route('login');
            }
            return;

        }
        try {
        // create a HybridAuth object
        $socialAuth = new Hybrid_Auth(app_path() . '/config/fb_auth.php');
        // authenticate with Google
        $provider = $socialAuth->authenticate("Facebook");
        // fetch user profile
        $userProfile = $provider->getUserProfile();
    }
    catch(Exception $e) {
        // exception codes can be found on HybBridAuth's web site
        return $e->getMessage();
    }

        Session::put('provider', 'Facebook');
     if (User::where('email', $userProfile->email)->first())
        {
            Flash::error('Another User with same email exists!');

            return Redirect::back()->withInput();
        }
    else{
        $data=array();
        $verification_token= md5($userProfile->email . rand());
        $is_verified=isset($userProfile->emailVerified)?1:0;
        $email=isset($userProfile->email)?$userProfile->email:NULL;
        $name=isset($userProfile->displayName)?$userProfile->displayName:NULL;
        $data = [
                            'name' => $userProfile->displayName,
                            'email'=> $userProfile->email,
                            'verification_token' => $verification_token ,
                            'email_verified' => $is_verified
                            //'newsletter' => (string) $session->getAccessToken()
                    ] ;

        $user = User::create($data);
        Auth::login($user);
        // echo "<pre>";
        //             print_r($data['name']);
        //             exit();
        // send activation email
        $activation_link = route('user.activate', ['email' => $data['email'], 'verification_token' => Auth::user()->verification_token]);
        Mail::send('users.email.welcome', ['name' => $data['name'], 'activation_link' => $activation_link], function ($message) use ($email,$name)
        {
            $message->to($email, $name)->subject('Welcome to Kampuzz.com!');
        });
        Flash::success('Welcome to Kampuzz. Please check your email for account activation instructions.');
        return Redirect::intended('user/dashboard');

    }
    // access user profile data
    // $credentials = array(
    //                     'email' => $userProfile->email ,
    //                     //'social_id' => $userProfile->identifier,
    //                 //  'social_access_token' => (string) $session->getAccessToken()
    //             );
    //             $user = User::where($credentials)->first() ;
    //             if(!$user) {
    //             $is_verified=isset($userProfile->emailVerified)?1:0;
    //                 $data = [
    //                         'name' => $userProfile->displayName,
    //                         'email'=> $userProfile->email,
    //                        // 'social_id' => $userProfile->identifier ,
    //                         //'social_entity_type' => $provider->id,
    //                         //'gender' => $userProfile->gender,
    //                         'email_verified' => $is_verified,
    //                         //'social_access_token' => (string) $session->getAccessToken()
    //                 ] ;
    //                 $s = User::insert($data);
    //                 $user = User::where($credentials)->first() ;
    //             }
                    
    //             Session::put('provider', 'Facebook');
    //             Auth::login($user);
    //             if($user) {     
    //                 return Redirect::to(route('home'));
    //             }

    
    }


    public function logout($id = NULL)
    {
        Auth::logout();
        if(Session::get('provider')=="Facebook"){
        //unset the entire session.
        $socialAuth = new Hybrid_Auth(app_path() . '/config/fb_auth.php');
        $provider = $socialAuth->authenticate("Facebook");
        $adapter = $socialAuth->getAdapter( 'Facebook' );

       

        $fb_logout_url = $adapter->api()->getLogoutUrl(); 
        $provider->logout();
       
        Session::flush();
        return Redirect::to($fb_logout_url) ;
         return Redirect::home();
       
        }
        return Redirect::home();
    }

}