<?php

namespace App\Modules\Users;

use App\Modules\Libraries\BaseRepo;

class UserRepo extends BaseRepo
{

    public function model()
    {
        return new User;
    }

} 