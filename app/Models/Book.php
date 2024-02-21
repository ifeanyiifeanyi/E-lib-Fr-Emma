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
}
