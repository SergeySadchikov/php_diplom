<?php

namespace FAQ\Http\Controllers;

use FAQ\Repositories\MenuRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    protected $menu_rep; //меню
    protected $cat_rep; //категории
    protected $ques_rep; //вопросы

    protected $template;

    protected $vars = [];

//    protected $bar = FALSE;
//    protected $contentLeftBar;

    public function __construct(MenuRepository $menu_rep) {
        $this->menu_rep = $menu_rep;
        //Меню по категориям
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.navigation')->with('menu', $menu)->render();
        $this->vars = array_add($this->vars, 'navigation', $navigation);
    }

    public function getMenu() {
        $menu = $this->menu_rep->get(['id', 'title']);
        return $menu;
        }

    public function renderOutput() {

        return view($this->template)->with($this->vars);
    }


}
