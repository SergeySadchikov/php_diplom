<?php

namespace FAQ\Http\Controllers\Admin;

use FAQ\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use FAQ\Answer;


class AnswerController extends AdminController
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'question_id' => 'integer|required',
            'text' => 'string|required'
        ]);

        if($validator->fails()) {
            return Response::json(['error'=>$validator->errors()->all()]);
        }

        $user = Auth::user();

        $answer = new Answer($data);

        if($user) {
           $answer->user_id = $user->id;
        }
        $post = Question::find($data['question_id']);

        $post->answer()->save($answer);

        return redirect('/admin/questions');

    }

}
