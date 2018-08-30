<?php

namespace FAQ\Http\Controllers;

use FAQ\Repositories\MenuRepository;
use FAQ\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class IndexController extends SiteController
{
    public function __construct(CategoryRepository $cat_rep)
    {
        parent::__construct(new MenuRepository(new \FAQ\Category));

        $this->cat_rep = $cat_rep;
        $this->template = env('THEME').'.index';
    }

    public function index()
    {
        //................Faq-items

        $categories = $this->getCategories();
        $faq_categories = view(env('THEME').'.faq_items')->with('categories',$categories)->render(); // Шаблон
        $this->vars = array_add($this->vars, 'faq_categories', $faq_categories);

        //....................View


        //dump($categories);

        foreach ($categories as $faq_cat)// Вывод категорий со связанными вопросами
        {
            $ques = $faq_cat->questions;
            echo ($faq_cat->title.'</br>');
                foreach ($ques as $que) {
                    echo($que->title.' '.$que->category_id).'</br>';
                }
        }

        return $this->renderOutput();
    }

    public function getCategories() {
        $categories = $this->cat_rep->get(['id', 'title']);
        return $categories;
    }



}

