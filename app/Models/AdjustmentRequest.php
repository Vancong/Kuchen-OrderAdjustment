<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdjustmentRequest extends Model
{
    //

    protected $fillable = [
        'code',
        'order_id',
        'created_by',
        'reason',
        'status',
        'processed_by',
        'rejection_reason',
        'processed_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    public function items()
    {
        return $this->hasMany(AdjustmentRequestItem::class);
    }
}
