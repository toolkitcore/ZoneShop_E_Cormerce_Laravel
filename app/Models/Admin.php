<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Định nghĩa bảng tương ứng
    protected $table = 'tbl_admin';

    // Các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'admin_email',
        'admin_password',
        'admin_roles',
        'admin_name',
        'admin_phone',
        'admin_img',
        'admin_status',
        'admin_remember_token',
    ];
}
