<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Neighborhood;
use App\Models\Property;
use App\Models\Transaction;
// or
use function App\Helpers\getWalletBalance; 

class PropertyController extends Controller
{
    

    public function propertiesShow($id)
    {
        $users = Auth::user();
        $data['property'] = Property::findOrFail(($id));
        $data['user'] = User::where('id', $users->id)
                        ->where('email', $users->email)
                        ->first();
        $neighborhoods = Neighborhood::with(['property', 'category'])->get();
 
        $data['neighborhoods'] = $neighborhoods->groupBy(function ($item) {
            return $item->category->name ?? 'Uncategorized';
        });
        if (request()->wantsJson()) {
            return response()->json([
                'property' => $data['property'],
                'valuation_summary' => $data['property']->valuationSummary,
                'neighborhoods' => $data['neighborhoods']
            ]);
        }
    }
}