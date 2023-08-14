<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $casts = [
        'tags' => 'array'
    ];

    protected $with = ['category'];
    protected $guarded = [];

    //create function to get the image from the storage
    public function getImageUrlAttribute($value)
    {
        return asset('storage/images/' . $value);
    }

    public function route()
    {
        return route('article.show', $this);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
