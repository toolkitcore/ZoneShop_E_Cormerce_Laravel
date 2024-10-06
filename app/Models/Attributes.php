<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    protected $table = 'tbl_attributes';
    protected $primaryKey = 'attribute_id';

    protected $fillable = [
        'category_id',
        'attribute_name'
    ];

    public function category()
    {
        return $this->belongsTo(Category_Product::class, 'category_id');
    }

    public function productAttributes()
    {
        return $this->hasMany(Product_Attributes::class, 'attribute_id');
    }
}
