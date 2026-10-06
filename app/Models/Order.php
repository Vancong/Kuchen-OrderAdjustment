<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'code',
        'channel',
        'status',
    ];
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function adjustmentRequests()
    {
        return $this->hasMany(AdjustmentRequest::class);
    }
}
