<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'idea',
        'user_id',
        'likes',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class, 'idea_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function likes()
    {
        // eager loading
        return $this->belongsToMany(User::class, 'idea_likes', 'idea_id', 'user_id')->withTimestamps();
    }
}
