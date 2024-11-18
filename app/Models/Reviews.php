<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'tbl_review_product';

    // Các trường có thể gán giá trị
    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'review',
        'is_approved',
        'is_featured',
        'transaction_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
