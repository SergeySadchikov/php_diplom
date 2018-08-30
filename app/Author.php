<?php

namespace FAQ;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name', 'email'
    ];

    public function questions() {
        return $this->hasMany('FAQ\Question');
    }
}
