<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_category_product';
    protected $fillable = [
        'category_id',
        'category_name',
        'category_parent_id',
        'category_desc',
        'category_status',
        'category_image',
    ];
}
