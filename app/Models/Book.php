<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'book_tags', 'book_id', 'tag_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function incrementViews()
    {
        $this->views = $this->views + 1;
        $this->save();
    }


    public function readers()
    {
        return $this->hasMany(UserBook::class)->where('read', true);
    }

    public function viewers()
    {
        return $this->hasMany(UserBook::class);
    }
}
