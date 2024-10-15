<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Images extends Model
{
    use HasFactory;
    protected $table = 'tbl_product_images';
    protected $primaryKey = 'image_id';

    protected $fillable = [
        'product_id',
        'image_name',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
