<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('email', $githubUser->getEmail())->first();

        if(!$user){
             //add user to database
            $user = User::create([
                'email' => $githubUser->getEmail(),
                'name'  => $githubUser->getName(),
                'provider_id' => $githubUser->getId(),
                'provider' => 'github',
                'password' => null,
            ]);
        }

        //login
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
      return Socialite::with('google')->redirect();
    }


    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        //dd($googleUser);

        $user = User::where('email', $googleUser->getEmail())->first();

        if(!$user){
             //add user to database
            $user = User::create([
                'email' => $googleUser->getEmail(),
                'name'  => $googleUser->getName(),
                'provider_id' => $googleUser->getId(),
                'provider' => 'google',
                'password' => null,
            ]);
        }

        //login
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }


}
