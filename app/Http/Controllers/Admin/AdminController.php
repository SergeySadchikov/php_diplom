<?php

namespace FAQ\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Lavary\Menu\Menu;


class AdminController extends \FAQ\Http\Controllers\Controller
{
    protected $cat_rep;

    protected $ques_rep;

    protected $user;

    protected $template;

    protected $content = FALSE;

    protected $title;

    protected $vars;

    public function __construct() {
        $this->user = Auth::user();

//        if(!$this->user) {
//            abort(403);
//        }
    }

    public function  renderOutput() {
        $this->vars = array_add($this->vars,'title', $this->title);

        $menu = $this->getMenu();

        $navigation = view(env('THEME').'.admin.navigation')->with('menu',$menu)->render();

        $this->vars = array_add($this->vars,'navigation', $navigation);

        if($this->content) {
            $this->vars = array_add($this->vars,'content', $this->content);
        }

        return view($this->template)->with($this->vars);


    }

    public function getMenu() {
         return \Menu::make('adminMenu',function ($menu) {

            $menu->add('Администраторы', array('route' => 'adminIndex'));
            $menu->add('Темы', array('route' => 'categories.index'));
            $menu->add('Вопросы', array('route' => 'questions.index'));

        });
    }



}
