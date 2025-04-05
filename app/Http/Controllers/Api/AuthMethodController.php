<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthMethodController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'auth_method' => [
                'required',
                Rule::in([User::AUTH_METHOD_PIN, User::AUTH_METHOD_BIOMETRIC, User::AUTH_METHOD_BOTH])
            ]
        ]);

        $user = Auth::user();
        
        // Additional validation for biometric
        if (in_array($validated['auth_method'], [User::AUTH_METHOD_BIOMETRIC, User::AUTH_METHOD_BOTH])) {
            if (empty($user->app_passcode)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please set a PIN first before enabling biometric authentication'
                ], 422);
            }
        }

        $user->update(['auth_method' => $validated['auth_method']]);

        return response()->json([
            'status' => 'success',
            'message' => 'Authentication method updated',
            'method' => $user->auth_method,
            'security_settings' => $user->securitySettings()
        ]);
    }

    public function checkBiometricSupport()
    {
        return response()->json([
            'biometric_available' => Auth::user()->canUseBiometric(),
            'supported_types' => Auth::user()->supportedBiometricTypes()
        ]);
    }


    public function show()
    {
        $user = Auth::user();
        
        return response()->json([
            'method' => $user->auth_method,
            'requires_pin' => $user->requiresPinAuth(),
            'requires_biometric' => $user->requiresBiometricAuth(),
            'has_passcode_set' => !empty($user->app_passcode)
        ]);
    }
}