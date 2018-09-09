<?php

namespace FAQ\Http\Controllers\Admin;

use Illuminate\Http\Request;
use FAQ\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('app.theme').'.admin.index';
    }
    public function index()
    {
        $user = Auth::user();
        $username = $user->name;
        $this->title = 'Добро пожаловать, '.$username;
        return $this->renderOutput();
    }
}
