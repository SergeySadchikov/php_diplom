<?php

namespace FAQ\Http\Controllers\Admin;

use FAQ\Author;
use FAQ\Category;
use FAQ\Repositories\CategoryRepository;
use FAQ\Repositories\QuestionsRepository;
use Illuminate\Http\Request;
use FAQ\Question;
use FAQ\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends AdminController
{
    public function __construct(QuestionsRepository $ques_rep, CategoryRepository $cat_rep)
    {
        parent::__construct();

        $this->template = env('THEME') . '.admin.questions';

        $this->ques_rep = $ques_rep;

        $this->cat_rep = $cat_rep;

        $this->content = TRUE;
    }


    //Просматривать вопросы в каждой теме. По каждому вопросу видно дату создания, статус (ожидает ответа / опубликован / скрыт).
    public function index()
    {
        $this->title = 'Управление вопросами';

        $questions = $this->getQuestions();
//        $questions->load(['category' => function($query) {
//            $query->orderBy('title', 'desc');
//        }]);

        //dd($questions);

        $this->content = view(env('THEME').'.admin.questions_content')->with('questions',$questions)->render();

        return $this->renderOutput();
    }

    public function getQuestions() {
        return $this->ques_rep->get();
    }

    public function create()
    {
    }


    public function store(Request $request)
    {
    }

    //Просмотреть вопрос и добавить ответ
    public function show($id)
    {
        $this->title = 'Вопрос';

        $question = $this->ques_rep->one($id, ['answer' => TRUE]);
        //dd($question);   //view
        $this->content = view(env('THEME').'.admin.question')->with('question', $question)->render();
        return $this->renderOutput();
    }

    //Редактировать автора, текст вопроса и текст ответа.
    //Перемещать вопрос из одной темы в другую.
    //Публиковать скрытые вопросы.
    //Скрывать опубликованные вопросы
    public function edit($id)
    {
        $this->title = 'Редактор вопросов';

        $question = $this->ques_rep->one($id, ['answer' => TRUE, 'category' => TRUE, 'author' => TRUE]);

        $categories = $this->cat_rep->get('id','title');

        $cat_select = array();

        foreach ($categories as $category) {
            $cat_select[$category->id] = $category->title;
        }
        $this->content = view(env('THEME').'.admin.question_edit')->with(['categories' => $cat_select, 'question' => $question])->render();

        return $this->renderOutput();

    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'question_title' => 'required|max:255',
            'question_text' => 'string|required',
            'answer_id' => 'integer|required',
            'answer_text' => 'sometimes|string',
            'author_id' => 'integer|required',
            'author_name' => 'required|max:255',
            'author_email' => 'required|string|email',
            'category_id' => 'integer|required',
            'status' => 'required|max:255'
        ]);

        if($validator->fails()) {
            //
        }

        $question = $this->ques_rep->one($id, ['answer' => TRUE, 'author' => TRUE]);
        $question->update([
            'title' => $data['question_title'],
            'text' => $data['question_text'],
            'category_id' => $data['category_id'],
            'status' => $data['status']
        ]);

        if (isset($data['answer_id'])) {
            $question->answer->update([
                'text' => $data['answer_text']
            ]);
        }

        $question->author->update([
            'name' => $data['author_name'],
            'email' => $data['author_email']
        ]);


        return redirect('/admin/questions');
    }


    public function destroy($id)
    {
        //
    }
}
