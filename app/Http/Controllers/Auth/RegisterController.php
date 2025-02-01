<?php

namespace App\Http\Controllers\Auth;
use Mail; 
use App\Http\Controllers\WalletController;
use App\Models\User;
use App\Models\ReferralLog;
use App\Models\VirtualAccount;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Validation\Rules\Password;
use App\Services\AuthService;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
   
    protected $authService;
    protected $walletController;

    // use RegistersUsers;

    protected $redirectTo = '/login';
    public function __construct(AuthService $authService, WalletController $walletController)
    {
        $this->authService = $authService;
        $this->walletController = $walletController;
        $this->middleware('guest');
    }

    public function showRegistrationForm($referralCode = null)
    {
        return view('auth.register', ['referralCode' => $referralCode]);
    }

    public function getRegister(){
        return response()->json([
            'message' => 'Get Register',
        ], 200);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
 
    public function register(Request $request, WalletController $walletController)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users,email',
            'phone' => 'required|string',
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
            'referral_code' => 'nullable|string|exists:users,referral_code',
            'dob' => [
                'required', 
                'date', 
                'before:' . now()->subYears(18)->format('Y-m-d'),
            ]
        ], [
            'dob.before' => 'You must be at least 18 years old to register.',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            \Log::error('Validation failed:', $validator->errors()->toArray());
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors(),
                ], 422);
            }
            return redirect()->back()
                    ->withErrors($validator->errors())
                    ->withInput();
        }
            
        

        try {
            // Call AuthService register method
            $result = app(AuthService::class)->register($request->all(), $walletController);
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Registration successful',
                    'user' => $result['user'],
                    'token' => $result['token'],
                ], 201);
            }
            return redirect()->route('login')->with('success', 'Please check your email to verify your account.');
        } catch (ValidationException $e) {
            \Log::error('ValidationException:', $e->errors());
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $e->errors(),
                ], 422);
            }
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        } catch (\Exception $e) {
            \Log::error('Registration failed:', ['error' => $e->getMessage()]);
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Registration failed',
                    'error' => $e->getMessage(),
                ], 500);
            }
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    

    protected function handleReferralCode($referralCode)
    {
        if ($referralCode) {
            $referrer = User::where('referral_code', $referralCode)->first();

            if ($referrer) {
                return $referrer->id; 
            }
        }
        return null; 
    }

   
}
