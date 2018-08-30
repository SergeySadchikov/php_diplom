<?php
/**
 * Created by PhpStorm.
 * User: Сергий
 * Date: 16.08.2018
 * Time: 23:33
 */

namespace FAQ\Repositories;

use FAQ\Question;

class QuestionsRepository extends Repository
{
    public function __construct(Question $question) {
        $this->model = $question;
    }
    public function one($id, $attr = array()) {
           $question = parent::one($id, $attr);
           if($question && !empty($attr)) {
                $question->load('answer');
                $question->load('category');
                $question->load('author');
           }
           return $question;
    }

}