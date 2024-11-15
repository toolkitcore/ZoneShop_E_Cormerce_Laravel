<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosterHome extends Model
{
    use HasFactory;
    protected $table = 'tbl_posters';

    protected $fillable = [
        'poster_image',
        'poster_status',
    ];
}
