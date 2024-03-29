<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;
use Google_Client;


use App\User;
use App\Website;

class userController extends Controller
{
    //




    //test
    public function test(Request $request)
    {
        $website = new Website();


        /*
        $website_domain = parse_url("http://www.ign.com", PHP_URL_HOST);
        preg_replace('/^www./', '', $website_domain);      
   
        return "this->". $website_domain;
        */
        $url = "http://www.ign.com";
        $url = "https://www.drupal.org/node/1930488";
        $url = "https://www.spotify.com/";
        $getwebdata = $website->getWebsiteData($url);

        $title = $getwebdata['title'];

        //return $getwebdata['title'];
        //return $title;
        return $getwebdata;
    }



    //Login
    public function loginGoogle(Request $request)
    {
        //varibles
        $this->vars = [];
        $remember = true;
        $token = $request['token'];
        $CLIENT_ID = '996626440039-7ranq95afc7hdb3bfgir5g2da8i0mb4e.apps.googleusercontent.com';

        // check token
        $client = new Google_Client(['client_id' => $CLIENT_ID]);
        $payload = $client->verifyIdToken($token);
        if ($payload) {
            $email = $payload['email'];
            $user = User::where('email', $email)->first();
            if ($user) {
                Auth::loginUsingId($user['id'], $remember);
            } else {
                $user = User::create([
                    'name'  => $payload['name'],
                    'email' => $payload['email'],
                    'password' => bcrypt($payload['jti'] . 'webshare-pass-safe'),
                ]);
                Auth::loginUsingId($user['id'], $remember);
            }
            $this->vars['status'] = 'success';
            $this->vars['user']['id'] = Auth::user()->id;
            $this->vars['user']['loggedin'] = true;
        } else {
            // Invalid ID token
            $this->vars['status'] = 'error';
            $this->vars['user']['loggedin'] = 'error';
        }

        //return data
        return $this->vars;
    }

    //Login
    public function login(Request $request)
    {
        //varibles
        $remember = true;

        //check details
        if (Auth::attempt($request->only(['email', 'password']), $remember)) {
            $this->vars['user']['id'] = Auth::user()->id;
            $this->vars['user']['loggedin'] = 'ok';
        } else {
            $this->vars['user']['loggedin'] = 'error';
        }

        //return data
        return $this->vars;
    }


    //Login Upload
    public function loginupload(Request $request)
    {
        //varibles
        $remember = true;

        //get image name
        if ($request->hasFile('photo')) {
            if ($request->file('photo')[0]->isValid()) {
                Auth::loginUsingId(1, true);
                $this->vars['user']['id'] = Auth::user()->id;
                $this->vars['user']['loggedin'] = true;
            }
        }

        //check users image name


        //return data
        return $this->vars;
    }


    //Signup
    public function signup(Request $request)
    {
        //varibles
        $remember = true;

        //Create User
        User::create([
            'name'  => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);


        //LoginUser
        if (Auth::attempt($request->only(['email', 'password']), $remember)) {
            $this->vars['user']['loggedin'] = true;
        } else {
            $this->vars['user']['loggedin'] = false;
        }

        return $this->vars;
    }


    //get user details
    public function show(Request $request, $userid)
    {
        //get user details        
        $this->vars['user'] = User::find($userid);

        //iseditable
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            if ($user_id == $userid) {
                $this->vars['isEditable'] = true;
            }
        }

        return $this->vars;
    }



    //search users
    public function search(Request $request)
    {
        //get search string
        $search = "%" . $request['search'] . "%";

        //get user details        
        $this->vars['users'] = User::where('name', 'LIKE', $search)->get();

        return $this->vars;
    }





    //View Links
    public function all(Request $request)
    {

        //get all users        
        $this->vars['users'] = User::all();



        //return back()
        return $this->vars;
    }





    //loggedin
    public function loggedin(Request $request)
    {

        //variables
        $this->vars['loggedin'] = false;
        $this->vars['sessionID'] = session()->getId();

        //check if logged in    
        if (Auth::check()) {
            $this->vars['loggedin'] = true;
            $this->vars['user']['id'] = Auth::user()->id;
        }

        //return
        return $this->vars;
    }




    //logout
    public function logout(Request $request)
    {

        //logout    
        Auth::logout();

        //set variable logout    
        $this->vars['loggedin'] = false;

        //return
        return $this->vars;
    }
}
