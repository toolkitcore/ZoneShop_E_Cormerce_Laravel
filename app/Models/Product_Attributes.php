<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Attributes extends Model
{
    use HasFactory;
    protected $table = 'tbl_product_attributes';

    protected $fillable = [
        'product_id',
        'attribute_id',
        'attribute_value'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function attribute()
    {
        return $this->belongsTo(Attributes::class, 'attribute_id');
    }
}
