<?php

namespace FAQ\Http\Controllers;

use FAQ\Repositories\MenuRepository;

class SiteController extends Controller
{
    protected $menuRepository;
    protected $categoryRepository;
    protected $questionRepository;
    protected $template;
    protected $vars = [];

    public function __construct(MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.navigation')->with('menu', $menu)->render();
        $this->vars = array_add($this->vars, 'navigation', $navigation);
    }

    public function getMenu()
    {
        $menu = $this->menuRepository->get(['id', 'title']);
        return $menu;
    }

    public function renderOutput()
    {
        return view($this->template)->with($this->vars);
    }
}
