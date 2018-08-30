<?php

namespace FAQ\Http\Controllers\Admin;

use FAQ\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use FAQ\Http\Controllers\Controller;
use FAQ\Http\Controllers\Admin\AdminController;


class CategoriesController extends AdminController
{
    public function __construct(CategoryRepository $cat_rep) {
        parent::__construct();

        $this->template = env('THEME').'.admin.categories';

        $this->cat_rep = $cat_rep;
    }

    public function index() {
        $this->title = 'Управление темами';

        $categories = $this->getCategories();

        $this->content = view(env('THEME').'.admin.categories_content')->with('categories', $categories)->render();

        //dd($categories);

        return $this->renderOutput();

    }

    public function getCategories() {
        return $this->cat_rep->get();
    }
}
