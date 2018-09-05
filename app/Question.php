<?php

namespace FAQ;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    use \SleepingOwl\WithJoin\WithJoinTrait;

    protected $fillable  = [
        'title', 'text', 'category_id', 'author_id', 'status'
    ];

    public function author()
    {
        return $this->belongsTo('FAQ\Author');
    }

    public function category()
    {
        return $this->belongsTo('FAQ\Category');
    }

    public function answer()
    {
        return $this->hasOne('FAQ\Answer');
    }

}

