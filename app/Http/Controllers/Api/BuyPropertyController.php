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

        // Create the Buy
        $buy = Buy::create($request->all());
        

        return response()->json([
            'status' => 'success',
            'message' => 'Buy Properties created successfully',
            'buy' => $buy,
        ], 201);
    }
}