<?php

namespace FAQ\Http\Controllers\Admin;

use FAQ\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use FAQ\Http\Controllers\Controller;
use FAQ\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Validator;
use FAQ\Category;
use Illuminate\Support\Facades\Redirect;


class CategoriesController extends AdminController
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->template = env('THEME').'.admin.categories';
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $this->title = 'Управление темами';
        $categories = $this->categoryRepository->get();
        $this->content = view(env('THEME').'.admin.categories_content')->with('categories', $categories)->render();
        return $this->renderOutput();
    }

    public function show(Request $request, $id)
    {
        $this->title = 'Просмотр вопросов в категории';
        $category = $this->categoryRepository->one($id);

        if ($request->input('show') === 'published') {
            $questions = $category->getPublishedQuestions();
        } elseif ($request->input('show') === 'waiting') {
            $questions = $category->getWaitingQuestions();
        } else {
            $questions = $category->questions;
        }
        $this->content =  view(env('THEME').'.admin.category_questions')->with('category', $category)->with('questions', $questions)->render();
        return $this->renderOutput();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'string|required'
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $category = new Category($data);
        $category->save();

        return Redirect::back();
    }

    public function destroy($id)
    {
        $this->categoryRepository->one($id)->delete();
        return Redirect::back();
    }
}
