<?php

namespace App\Modules\Libraries;

use Carbon\Carbon;

abstract class BasePresenter
{

    /**
     * @var
     */
    protected $entity;

    /**
     * Set the entity
     *
     * @param $entity
     */
    function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Magic method to get the method on the presenter
     *
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if(method_exists($this, $property))
        {
            return $this->{$property}();
        }

        return $this->entity->{$property};
    }

    /**
     * Return the true if the status attribute is enabled
     *
     * @return bool
     */
    public function enabled()
    {
        if($this->status == 'enabled')
        {
            return true;
        }
        return false;
    }

    /**
     * Return the created attribute on diff for humans ( 3 days ago )
     *
     * @return string
     */
    public function created()
    {
        return Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    }


    /**
     * Return the title attribute with format
     *
     * @return string
     */
    public function getTitle()
    {
        return ucfirst($this->title);
    }


} 