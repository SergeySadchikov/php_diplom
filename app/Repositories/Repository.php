<?php
/**
 * Created by PhpStorm.
 * User: Сергий
 * Date: 12.08.2018
 * Time: 1:41
 */

namespace FAQ\Repositories;

//use Config;

abstract class Repository
{
    protected $model = FALSE;

    public function get()
    {
        $builder = $this->model->select('*');
        return $builder->get();
    }

    public  function one($id, $attr = array())
    {
        $result = $this->model->where('id',$id)->first();
        return $result;
    }

}
