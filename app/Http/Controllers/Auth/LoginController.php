<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request, $user){



        if($user->hasRole('System Adminstrator')){
            return redirect(route('home'));
        } else if($user->hasRole('Clerk')){

            return redirect(route('record.index'));
        } else if($user->hasRole('Chief of Staff')){

            return view('component.cos.index');
        } else if($user->hasRole('Lawyer')){

            return view('component.lawyer.index');
        } else if($user->hasRole('Admin Head')){

            return view('component.adminhead.index');
        } else {
            return redirect(route('logout'));
        }
    }
}
