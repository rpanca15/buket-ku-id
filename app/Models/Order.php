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
        'product_count', // Menambahkan kolom jumlah produk
        'cod_date', // Tanggal COD
        'cod_location', // Lokasi COD
    ];

    /**
     * Relasi ke model User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model OrderDetail.
     */
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Relasi ke model OrderStatus.
     */
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    /**
     * Accessor untuk mendapatkan nama status pesanan.
     */
    public function getStatusNameAttribute()
    {
        return $this->status ? $this->status->status : 'Unknown';
    }
}
