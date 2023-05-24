<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        if(isset($filters['keyword2']) ? $filters['keyword2'] : false){
            return $query->where('name', 'like', '%' . $filters['keyword2'] . '%');
        }
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
