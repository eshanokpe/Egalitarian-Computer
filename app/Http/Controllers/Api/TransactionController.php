<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
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
            'property_id' => 'required|integer|exists:properties,id',
            'property_name' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'reference' => 'required|string|unique:transactions,reference',
            'transaction_state' => 'required|string',
            'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        } 

        // Create the transaction
        $transaction = Transaction::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Transaction created successfully',
            'transaction' => $transaction,
        ], 201);
    }
}