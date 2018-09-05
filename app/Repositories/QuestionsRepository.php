<?php
/**
 * Created by PhpStorm.
 * User: Сергий
 * Date: 16.08.2018
 * Time: 23:33
 */

namespace FAQ\Repositories;

use FAQ\Question;
use Illuminate\Support\Facades\Request;
class QuestionsRepository extends Repository
{
    public function __construct(Question $question)
    {
        $this->model = $question;
    }
    public function one($id, $attr = array())
    {
           $question = parent::one($id, $attr);
           if($question && !empty($attr)) {
                $question->load('answer');
                $question->load('category');
                $question->load('author');
           }
           return $question;
    }

    public function questionsWithCategory()
    {
        return $this->model->join('categories', 'questions.category_id', '=', 'categories.id')->orderBy('categories.title', 'desc')->get();
    }

    public function sortByStatus($questions)
    {
        switch(Request::input('sortByStatus')) {
            case 1:
                return $questions->where('status', 'Ожидает ответ');
                break;
            case 2:
                return $questions->where('status', 'Опубликован');
                break;
            case 3:
                return $questions->where('status', 'Скрыт');
            default:
                return $questions;
        }
    }

    public function sortByDate($questions)
    {
        return $questions->sortBy('created_at');
    }
}
