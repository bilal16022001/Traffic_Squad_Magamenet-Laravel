<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\AuthTrait;

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

    // use AuthenticatesUsers;
    // protected $redirectTo = RouteServiceProvider::HOME;
    use AuthTrait;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginForm($type)
    {


        if ($type == "offense") {
            return view('auth.loginOffense', compact('type'));
        } else {
            return view('auth.login', compact('type'));
        }
    }

    public function login(Request $request)
    {
        if ($request->type == "offense") {
            if (Auth::guard("offense")->attempt(['Phone' => $request->phone, 'password' => $request->password])) {
                return $this->redirect($request);
                toastr()->success("Login has been saved successfully!");
            } else {
                return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
            }
        } else {
            if (Auth::guard($this->checkguard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
                return $this->redirect($request);
                toastr()->success("Login has been saved successfully!");
            } else {
                return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
            }
        }
    }



    public function logout(Request $request, $type)
    {

        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
