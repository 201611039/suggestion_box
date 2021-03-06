<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'people' => 'array'
    ];

    public function scopeHasPeople($query, $id)
    {
        return $query->where('people', 'like', "%\"{$id}\"%");
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
