<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;

class Rsvp extends Model
{
    protected $fillable = [
        'order_id',
        'guest_name',
        'attendance',
        'guest_count',
        'message',
    ];

    // RELATION
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
