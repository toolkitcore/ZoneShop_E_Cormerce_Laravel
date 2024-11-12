<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'tbl_posts';
    protected $fillable = [
        'title',
        'content',
        'category',
        'publication_date',
        'tags',
        'post_image',
        'post_des'
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id');
    }
    public function interactions()
    {
        return $this->hasMany(interactions::class, 'post_id');
    }
}
