<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyValuationSummary extends Model
{
    use HasFactory;  
 
    protected $fillable = ['property_id', 'property_valuation_id', 'initial_value_sum'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function propertyValuation()
    {
        return $this->belongsTo(PropertyValuation::class);
    }
}
