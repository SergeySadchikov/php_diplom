<?php

namespace FAQ\Http\Controllers\Admin;

use FAQ\Repositories\CategoryRepository;
use FAQ\Repositories\QuestionsRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionsController extends AdminController
{
    public function __construct(QuestionsRepository $questionRepository, CategoryRepository $categoryRepository)
    {
        parent::__construct();

        $this->template = config('app.theme') . '.admin.questions';
        $this->questionRepository = $questionRepository;
        $this->categoryRepository = $categoryRepository;
        $this->content = TRUE;
    }

    //Просматривать вопросы в каждой теме. По каждому вопросу видно дату создания, статус (ожидает ответа / опубликован / скрыт).
    public function index(Request $request)
    {
        $this->title = 'Управление вопросами';

        $questions = $this->getQuestions();
        if($request->has('sortByStatus')) {
            $questions = $this->questionRepository->sortByStatus($questions);
        }

        if($request->has('sortByDate')) {
            $questions = $this->questionRepository->sortByDate($questions);
        }
        $this->content = view(config('app.theme').'.admin.questions_content')->with('questions',$questions)->render();

        return $this->renderOutput();
    }

    public function getQuestions() {
        return $this->questionRepository->questionsWithCategory();
    }

    //Просмотреть вопрос и добавить ответ
    public function show($id)
    {
        $this->title = 'Вопрос';
        $question = $this->questionRepository->one($id, ['answer' => TRUE]);
        $this->content = view(config('app.theme').'.admin.question')->with('question', $question)->render();
        return $this->renderOutput();
    }

    //----Редактировать автора, текст вопроса и текст ответа.
    //----Перемещать вопрос из одной темы в другую.
    //----Публиковать скрытые вопросы.
    //----Скрывать опубликованные вопросы
    public function edit($id)
    {
        $this->title = 'Редактор вопросов';
        $question = $this->questionRepository->one($id, ['answer' => TRUE, 'category' => TRUE, 'author' => TRUE]);
        $categories = $this->categoryRepository->get('id','title');
        $categorySelect = array();
        $statuses = [
            'Ожидает ответ' => 'Ожидает ответ',
            'Опубликован' => 'Опубликован',
            'Скрыт' => 'Скрыт'
        ];

        foreach ($categories as $category) {
            $categorySelect[$category->id] = $category->title;
        }
        $this->content = view(config('app.theme').'.admin.question_edit')->with(['categories' => $categorySelect, 'question' => $question, 'statuses' => $statuses])->render();
        return $this->renderOutput();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'question_title' => 'required|max:255',
            'question_text' => 'string|required',
            'answer_id' => 'integer',
            'answer_text' => 'sometimes|string',
            'author_id' => 'integer|required',
            'author_name' => 'required|max:255',
            'author_email' => 'required|string|email',
            'category_id' => 'integer|required',
            'status' => 'required|max:255'
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $question = $this->questionRepository->one($id, ['answer' => TRUE, 'author' => TRUE]);
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
        $question = $this->questionRepository->one($id, ['answer' => TRUE, 'author' => TRUE]);
        $question->delete();
        return redirect('/admin/questions');
    }
}
