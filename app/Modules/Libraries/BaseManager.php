<?php

namespace App\Modules\Libraries;

use EasySlug\EasySlug\EasySlugFacade as Sluger;

abstract class BaseManager {

    use UploadFileTrait;

    /**
     * @var
     */
    protected $entity;
    /**
     * @var
     */
    protected $data;

    /**
     * @param $entity
     * @param $data
     */
    public function __construct($entity, $data)
	{
		$this->entity   = $entity;
		$this->data     = $data;
		$this->filePaths  = $this->getFilePaths();
	}

    /**
     * @param $data
     *
     * @return mixed
     */public function prepareData($data)
	{
		return $data;
	}

    /**
     * @return bool
     */
    public function save()
	{
        $this->entity->fill($this->prepareData($this->data));
        $this->entity->save();
        $this->uploadFiles();
		return true;
	}

    /**
     * Create Slug on prepareData, The table need to have a "slug" attribute.
     * The first argument is the request data to be filled on the model.
     * The second argument is the field on the table that will be converted to the slug.
     *
     * @param $data
     * @param $slug_field
     * @return mixed
     */
    protected function generateSlug($data, $slug_field)
    {
        if(!$this->entity->exists() || $this->entity->{$slug_field} != $data[$slug_field])
        {
            $data['slug'] = Sluger::generateUniqueSlug($data[$slug_field], $this->entity->getTable());
        }
        return $data;
    }

}