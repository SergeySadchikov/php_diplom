<?php

namespace FAQ;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use \SleepingOwl\WithJoin\WithJoinTrait;

    protected $fillable = ['title'];

    public function questions()
    {
        return $this->hasMany('FAQ\Question');
    }

    public function getAllQuestions()
    {
        return $this->questions()->get();
    }

    public function getPublishedQuestions()
    {
        return $this->questions()->where('status','Опубликован')->get();
    }

    public function getWaitingQuestions()
    {
        return $this->questions()->where('status','Ожидает ответ')->get();
    }
}

