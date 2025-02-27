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
        // Validate the input
        $request->validate([
            'old_pin' => 'nullable|min:4|max:4', // Old PIN is optional
            'new_pin' => 'required|min:4|max:4|confirmed', // New PIN is required and must be confirmed
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user already has a transaction PIN
        if ($user->transaction_pin) {
            // If the user has a PIN, validate the old PIN
            if (!Hash::check($request->old_pin, $user->transaction_pin)) {
                return $this->sendErrorResponse('The old PIN is incorrect.', 400, $request);
            }
        } else {
            // If the user does not have a PIN, ensure the old_pin field is empty
            if ($request->old_pin) {
                return $this->sendErrorResponse('You do not have an old PIN set. Leave this field blank.', 400, $request);
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
