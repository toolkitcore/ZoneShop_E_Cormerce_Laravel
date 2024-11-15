<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'tbl_product';

    // Khóa chính của bảng (nếu khác với 'id')
    protected $primaryKey = 'product_id';

    // Các trường có thể được gán giá trị hàng loạt (mass assignable)
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price_original',
        'product_price_selling',
        'product_quantity',
        'product_image',
        'brand_id',
        'category_id',
        'product_status'
    ];

    // Bỏ qua các trường timestamp nếu không dùng chúng
    public $timestamps = true;


    public function brand()
    {
        return $this->belongsTo(Brand_Product::class, 'brand_id', 'brand_id');
    }


    public function category()
    {
        return $this->belongsTo(Category_Product::class, 'category_id', 'category_id');
    }

    public function productAttributes()
    {
        return $this->hasMany(Product_Attributes::class, 'product_id');
    }

    public function productImages()
    {
        return $this->hasMany(Product_Images::class, 'product_id');
    }
    public function orders()
    {
        return $this->hasMany(Orders::class, 'product_id', 'product_id');
    }
}
