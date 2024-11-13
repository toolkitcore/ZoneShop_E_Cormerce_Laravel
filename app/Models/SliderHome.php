<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderHome extends Model
{
    use HasFactory;
    protected $table = 'tbl_slider_home';

    protected $fillable = [
        'product_id',
        'slider_image',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Khóa ngoại 'product_id' liên kết với bảng products
    }
}
