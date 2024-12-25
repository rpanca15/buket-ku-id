<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status_id',
        'product_count',
        'cod_date',
        'cod_location',
    ];

    protected $with = ['details', 'status', 'payment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function getStatusNameAttribute()
    {
        return $this->status ? $this->status->status : 'Unknown';
    }
}
