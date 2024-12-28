<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->middleware('auth')->only('logout');
    }

    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->role == 'sales') {
                return redirect()->intended('sales');
            }
        }
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        $credential = $request->only('username', 'password');
        if(Auth::attempt($credential)){
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect()->intended('admin');
            }elseif($user->role == 'sales'){
                return redirect()->intended('sales');
            }
            return redirect()->intended('/');
        }

        return redirect('login')->withInput()->withErrors(['login_gagal' => 'these credentials do not match our records']);
    }
}
