<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'user_id', 'title', 'body','slug'
    ];


    public function getTrimBodyAttribute()
    {
        return str_limit($this->body, $limit = 100, $end = '...');
    }

    public function getTrimTitleAttribute($value)
    {
        return str_limit($this->title, $limit = 20, $end = '...');
    }
}
