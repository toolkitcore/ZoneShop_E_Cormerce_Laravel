<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác với tên model (nếu cần)
    protected $table = 'tbl_transactions';

    // Các cột có thể gán giá trị (mass assignable)
    protected $fillable = [
        'user_id',
        'transaction_name',
        'transaction_email',
        'transaction_phone',
        'pickup_address_id',
        'delivery_address_id',
        'transaction_amount',
        'transaction_payment',
        'transaction_message',
        'transaction_status',
    ];

    // Quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Quan hệ với model Address (pickup address)
    public function pickupAddress()
    {
        return $this->belongsTo(Address::class, 'pickup_address_id');
    }

    // Quan hệ với model Address (delivery address)
    public function deliveryAddress()
    {
        return $this->belongsTo(Address::class, 'delivery_address_id');
    }
}
