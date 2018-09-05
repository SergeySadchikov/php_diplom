<?php

namespace FAQ;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name', 'email'
    ];

    public function question()
    {
        return $this->hasMany('FAQ\Question');
    }
}
