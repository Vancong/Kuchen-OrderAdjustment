<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdjustmentRequestItem extends Model
{
    //
    protected $fillable = [
        'adjustment_request_id',
        'old_sku',
        'new_sku',
        'old_quantity',
        'new_quantity',
    ];
    public function adjustmentRequest()
    {
        return $this->belongsTo(AdjustmentRequest::class);
    }
}
