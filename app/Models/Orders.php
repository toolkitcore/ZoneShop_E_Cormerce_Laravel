<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'tbl_orders'; // Tên bảng
    protected $primaryKey = 'order_id'; // Khóa chính

    protected $fillable = [
        'transaction_id',
        'product_id',
        'order_qty',
        'order_product_name',
        'order_price',
        'order_amount'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'transaction_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
