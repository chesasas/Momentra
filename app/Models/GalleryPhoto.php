<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;

class GalleryPhoto extends Model
{
    protected $fillable = [
        'order_id',
        'file_path',
        'sort_order',
    ];

    // RELATION
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
