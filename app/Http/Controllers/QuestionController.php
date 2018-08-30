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

class QuestionController extends SiteController
{
    public function __construct(QuestionsRepository $ques_rep)
    {
        parent::__construct(new MenuRepository(new \FAQ\Category));
        $this->template = env('THEME').'.questions';
        $this->ques_rep = $ques_rep;
        $this->vars = TRUE;

    }

    //Просмотр конкретного вопроса
    public function show($id = FALSE)
    {
        $question = $this->ques_rep->one($id, ['answer' => TRUE]);
        //dd($question);   //view
        $content = view(env('THEME').'.question')->with('question', $question)->render();
        $this->vars = array_add($this->vars,'content', $content);

        return $this->renderOutput();
    }
    //Пользователь может задать вопрос
    public function store(Request $request)
    {
        $data = $request->all();
        //$data['category_id'] = $request->input('question_post_ID');
        //print_r($data);
        $validator = Validator::make($data, [
            'category_id' => 'integer|required',
            'title' => 'string|required',
            'text' => 'string|required',
            'name' => 'required|max:255',
            'email' => 'required|max:255'
        ]);

        if($validator->fails()) {
            //return Response::json(['error'=>$validator->errors()->all()]);
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $author = new Author($data);
        $author->save();

        $question = new Question($data);
        $question->author_id = $author->id;

        $category = Category::find($data['category_id']);
        $category->questions()->save($question);

        return Redirect::back();
    }
}



