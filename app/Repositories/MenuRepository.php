<?php
/**
 * Created by PhpStorm.
 * User: Сергий
 * Date: 12.08.2018
 * Time: 1:42
 */

namespace FAQ\Repositories;

use FAQ\Category;

class MenuRepository extends Repository
{
    public function __construct(Category $menu)
    {
        $this->model = $menu;
    }
}


?>