<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
    protected $perPage = 10;

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
