<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function scopeFilter($query, array $filters)
    {
        if(isset($filters['title']) ? $filters['title'] : false){
            return $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if(isset($filters['keyword']) ? $filters['keyword'] : false){
            return $query->where('title', 'like', '%' . $filters['keyword'] . '%');
        }
    }

    public function category()
    {
        return $this->BelongsTo(Category::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
