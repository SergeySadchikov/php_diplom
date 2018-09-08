<?php
namespace FAQ\Http\Controllers;

use FAQ\Category;
use FAQ\Question;
use FAQ\Author;
use FAQ\Repositories\MenuRepository;
use FAQ\Repositories\QuestionsRepository;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class QuestionController extends SiteController
{
    public function __construct(QuestionsRepository $questionRepository)
    {
        parent::__construct(new MenuRepository(new \FAQ\Category));
        $this->template = env('THEME').'.question';
        $this->questionRepository = $questionRepository;

    }

    //Просмотр конкретного вопроса
    public function show($id)
    {
        $question = $this->questionRepository->one($id, ['answer' => TRUE]);
        $this->vars = array_add($this->vars,'question', $question);
        return $this->renderOutput();
    }
    //Пользователь может задать вопрос
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'category_id' => 'integer|required',
            'title' => 'string|required',
            'text' => 'string|required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $author = new Author($data);
        $author->save();

        $question = new Question($data);
        $question->author_id = $author->id;

        $category = Category::find($data['category_id']);
        $category->questions()->save($question);

        Session::flash('status','Спасибо за ваш вопрос! Администратор вскоре опубликует его!');
        return Redirect::back();
    }
}



