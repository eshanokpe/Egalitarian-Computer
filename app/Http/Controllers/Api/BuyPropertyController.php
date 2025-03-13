<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;
use Illuminate\Support\Facades\Validator;

class BuyPropertyController extends Controller
{
    /**
     * Store a new transaction.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer|exists:users,id',
            'email' => 'required|email',
            'transaction_id' => 'required|integer|exists:transactions,id',
            'property_id' => 'required|integer|exists:properties,id',
            'selected_size_land' => 'required|string',
            'total_price' => 'required|numeric|min:0',
            'remaining_size' => 'required|string',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ], 404);
        }

        // Create the Buy
        $buy = Buy::create([
            'user_id' => $request->user_id,
            'user_email' => $request->email,
            'transaction_id' => $request->transaction_id,
            'property_id' => $request->property_id,
            'selected_size_land' => $request->selected_size_land,
            'total_price' => $request->total_price,
            'remaining_size' => $request->remaining_size,
            'status' => $request->status,
        ]);
        

        return response()->json([
            'status' => 'success',
            'message' => 'Buy Properties created successfully',
            'buy' => $buy,
        ], 201);
    }
}