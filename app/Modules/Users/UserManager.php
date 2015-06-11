<?php

namespace App\Modules\Users;

use App\Modules\Libraries\BaseManager;

/**
 * Class UserManager
 * @package App\Modules\Users
 */
class UserManager extends BaseManager
{

    /**
     * Return the directory where the avatar are stored
     *
     * @return array
     */
    public function getFilePaths()
    {
        return [
            'avatar' => 'avatars'
        ];
    }

    /**
     * Prepare data before put in the database
     *
     * @param $data
     * @return mixed
     */
    public function prepareData($data)
    {
        $this->deleteOldFile('avatar');

        if(empty($data['password']))
        {
            unset($data['password']);
        }

        $data = $this->generateSlug($data, 'name');

        return $data;
    }

}