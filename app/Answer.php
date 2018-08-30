<?php

namespace FAQ;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['text','name','email','question_id','user_id'];

    public function question() {
        return $this->belongsTo('FAQ\Question');
    }

    public function user() {
        return $this->belongsTo('FAQ\User');
    }
}
