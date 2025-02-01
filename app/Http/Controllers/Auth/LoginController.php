<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Validation\ValidationException;

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

    public function login(Request $request)
    { 
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        // Attempt to log in with credentials
        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasVerifiedEmail()) {
                 if ($request->wantsJson()) {
                    return response()->json([
                        'message' => 'Login successful',
                        'user' => Auth::user(),
                        'token' => Auth::user()->createToken('dohmayn')->plainTextToken, // For API Token
                    ], 200);
                }
                return redirect()->route('user.dashboard');
            }
            Auth::logout();
            return $this->sendFailedLoginResponse($request);
        }
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Login failed',
                'error' => 'Invalid email or password.',
            ], 401);
        }
        return back()->withErrors([
            'login_error' => 'Invalid email or password.',
        ])->onlyInput('email'); 
    }

    
    protected function sendFailedLoginResponse(Request $request)
    {
        if ($request->wantsJson()) {
            // For API response
            return response()->json([
                'message' => 'Login failed',
                'error' => 'Your account has not been verified. Please check your email to verify your account.',
            ], 401); // Unauthorized
        }
        throw ValidationException::withMessages([
            $this->username() => 'Your account has not been verified. Please check your email to verify your account.',
        ]);
    }
}
