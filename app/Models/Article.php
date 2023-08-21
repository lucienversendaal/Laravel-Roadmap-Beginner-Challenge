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
        'tag_ids' => 'array'
    ];

    protected $with = ['category', 'user'];
    protected $guarded = [];

    //create function to get the image from the storage
    public function getImage()
    {
        $imagePath = 'storage/images/' . $this->image_url;
        $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);

        if (in_array($imageExtension, ['png', 'jpg', 'jpeg'])) {
            return asset($imagePath);
        }

        return $this->image_url;
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
