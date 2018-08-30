<?php
namespace FAQ\Repositories;

use FAQ\Category;

class CategoryRepository extends Repository
{
    public function __construct(Category $category) {
        $this->model = $category;
    }

}

?>