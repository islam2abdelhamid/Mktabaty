<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    //protected $redirectTo = '/';
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin) {
            return redirect()->intended('admin');
        } else {
            return redirect()->intended('/');
        }
    }
    public function username()
    {
        $logintype = $_POST['username'];
        $this->username = filter_var($logintype, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$this->username => $logintype]);
        
        $userState = User::where($this->username, $_POST['username'])->value('isActive');
        if (!$userState)
            return false;

        return property_exists($this, 'username') ? $this->username : 'email';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
