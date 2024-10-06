<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_category_product';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_id',
        'category_name',
        'category_parent_id',
        'category_sort_order',
        'category_desc',
        'category_status',
        'category_image',
    ];

    public function attributes()
    {
        return $this->hasMany(Attributes::class, 'category_id');
    }
}
