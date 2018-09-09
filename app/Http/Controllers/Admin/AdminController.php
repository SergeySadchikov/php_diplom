<?php

namespace FAQ\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Lavary\Menu\Menu;

class AdminController extends \FAQ\Http\Controllers\Controller
{
    protected $categoryRepository;
    protected $questionRepository;
    protected $adminsRepository;
    protected $user;
    protected $template;
    protected $content = FALSE;
    protected $title;
    protected $vars;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function  renderOutput()
    {
        $this->vars = array_add($this->vars,'title', $this->title);
        $menu = $this->getMenu();
        $navigation = view(config('app.theme').'.admin.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation', $navigation);

        if($this->content) {
            $this->vars = array_add($this->vars,'content', $this->content);
        }
        return view($this->template)->with($this->vars);
    }

    public function getMenu()
    {
         return \Menu::make('adminMenu',function ($menu) {
            $menu->add('Администраторы', array('route' => 'admins.index', 'class' => "nav-item nav-link active bg-secondary badge badge-secondary"));
            $menu->add('Темы', array('route' => 'categories.index', 'class' => "nav-item nav-link active bg-secondary badge badge-secondary"));
            $menu->add('Вопросы', array('route' => 'questions.index', 'class' => "nav-item nav-link active bg-secondary badge badge-secondary"));
        });
    }
}
