<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index(){
        $data['user'] = Auth::user();
        $data['referralsMade'] = $data['user']->referralsMade()->with('user', 'referrer')->take(6)->get();
        $data['hasMoreReferrals'] = $data['referralsMade']->count() > 6;
        return view('user.pages.security.index', $data); 
    }

    public function changePassword(){
        $data['user'] = Auth::user();
        $data['referralsMade'] = $data['user']->referralsMade()->with('user', 'referrer')->take(6)->get();
        $data['hasMoreReferrals'] = $data['referralsMade']->count() > 6;
        return view('user.pages.security.changePassword', $data); 
    }

    public function changePasswordPost(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed', 
        ]);

        $user = Auth::user();

        // Check if old password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'The old password is incorrect.',
                ], 400);
            } else {
                return back()->withErrors(['old_password' => 'The old password is incorrect.']);
            }
        }

        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Password changed successfully. For security reasons, please log in again.',
            ], 200);
        } else {
            return back()->with('success', 'Password changed successfully. For security reasons, please log in again.');
        }
    }

    public function transactionPin(){
        $data['user'] = Auth::user();
        $data['referralsMade'] = $data['user']->referralsMade()->with('user', 'referrer')->take(6)->get();
        $data['hasMoreReferrals'] = $data['referralsMade']->count() > 6;
        return view('user.pages.security.transactionPin', $data); 
    }

    
    public function createTransactionPin(Request $request, $id)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Define validation rules conditionally
        $rules = [
            'new_pin' => 'required|min:4|max:4', // New PIN is always required
        ];

        // If the user already has a PIN, enforce old_pin and new_pin confirmation
        if ($user->transaction_pin) {
            $rules['old_pin'] = 'required|min:4|max:4'; // Old PIN is required
            $rules['new_pin'] .= '|confirmed'; // Add confirmation rule for new PIN
        }

        // Validate the input
        $request->validate($rules);

        // If the user has a PIN, validate the old PIN
        if ($user->transaction_pin) {
            if (!Hash::check($request->old_pin, $user->transaction_pin)) {
                return $this->sendErrorResponse('The old PIN is incorrect.', 400, $request);
            }
        }

        // Update the user's transaction PIN
        $user->transaction_pin = Hash::make($request->new_pin);
        $user->save();

        // Return success response
        return $this->sendSuccessResponse('Transaction PIN created/updated successfully.', 200, $request);
    }

    // Helper function to send error responses
    private function sendErrorResponse($message, $statusCode, $request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => $message,
            ], $statusCode);
        } else {
            return back()->withErrors(['error' => $message]);
        }
    }

    // Helper function to send success responses
    private function sendSuccessResponse($message, $statusCode, $request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
            ], $statusCode);
        } else {
            return back()->with('success', $message);
        }
    }

}
