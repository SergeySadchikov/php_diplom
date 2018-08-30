<?php

namespace FAQ;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function questions() {
        return $this->hasMany('FAQ\Question');
    }
}
