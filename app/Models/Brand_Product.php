<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand_Product extends Model
{
    use HasFactory;
    protected $table = 'tbl_brand_product';

    protected $primaryKey = 'brand_id';

    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_desc',
        'brand_status',
    ];
}
