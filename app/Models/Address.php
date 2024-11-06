<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'tbl_address';

    protected $primaryKey = 'address_id';


    // Các cột có thể gán giá trị (mass assignable)
    protected $fillable = [
        'user_id',
        'address_type',
        'province',
        'district',
        'ward',
        'address',
    ];

    // Quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
