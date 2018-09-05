<?php
/**
 * Created by PhpStorm.
 * User: Сергий
 * Date: 04.09.2018
 * Time: 11:39
 */

namespace FAQ\Repositories;

use FAQ\User;


class AdminsRepository extends Repository
{
    public function __construct(User $user) {
        $this->model = $user;
    }
}