<?php

namespace App\Modules\Presenters;

use App\Modules\Libraries\BasePresenter;

class User extends BasePresenter
{
    /**
     * Present the avatar on the view
     *
     * @return mixed|string
     */
    public function photo()
    {
        if(empty($this->avatar) && file_exists($this->avatar))
        {
            return asset($this->avatar);
        }

        return 'backend/dist/img/avatar.png';
    }
} 