<?php

namespace App\Modules\Libraries;

use PhpSpec\Exception\Exception;

trait PresentableTrait
{

    /**
     * @var
     */
    protected $presenterInstance;


    /**
     * @return mixed
     * @throws Exception
     */
    public function present()
    {
        if( ! $this->presenter or ! class_exists($this->presenter))
        {

            throw new Exception("Please set the protected property to your presenter path");

        }

        if ( ! $this->presenterInstance)
        {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;

    }

} 