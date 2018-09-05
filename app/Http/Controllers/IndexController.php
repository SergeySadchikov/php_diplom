<?php

namespace FAQ\Http\Controllers;

use FAQ\Repositories\MenuRepository;
use FAQ\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class IndexController extends SiteController
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct(new MenuRepository(new \FAQ\Category));
        $this->categoryRepository = $categoryRepository;
        $this->template = env('THEME').'.index';
    }

    public function index()
    {
        $categories = $this->getCategories();
        $categorySelect = array();

        foreach ($categories as $category) {
            $categorySelect[$category->id] = $category->title;
        }
        $indexContent = view(env('THEME').'.indexContent')->with(['categories' => $categories, 'categorySelect' => $categorySelect])->render();
        $this->vars = array_add($this->vars, 'indexContent', $indexContent);
        return $this->renderOutput();
    }

    public function getCategories()
    {
        $categories = $this->categoryRepository->get(['id', 'title']);
        return $categories;
    }



}

