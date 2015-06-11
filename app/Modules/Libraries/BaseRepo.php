<?php

namespace App\Modules\Libraries;

abstract class BaseRepo
{

    /**
     * @var
     */
    protected $model;

    /**
     * Set the model repository.
     */
    public function __construct()
	{
		$this->model = $this->model();
	}

    /**
     * @return mixed
     */
    abstract public function model();

    /**
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */public function find($id, array $columns = ['*'])
	{
		return $this->model->find($id, $columns);
	}

    /**
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */public function findOrFail($id, array $columns = ['*'])
	{
		return $this->model->findOrFail($id, $columns);
	}

    /**
     * @param      $column
     * @param null $key
     *
     * @return mixed
     */public function lists($column, $key = null)
	{
		return $this->model->lists($column, $key);
	}

    /**
     * @param array $columns
     *
     * @return mixed
     */public function all($columns = ['*'])
	{
		return $this->model->all($columns);
	}

    /**
     * @param      $column
     * @param null $operator
     * @param null $value
     *
     * @return mixed
     */
    public function where($column, $operator = null, $value = null){
        return$this->model->where($column, $operator, $value);
    }

    /**
     * @param       $colum
     * @param array $array
     *
     * @return mixed
     */
    public function whereIn($colum, Array $array){
        return$this->model->whereIn($colum, $array);
    }

    /**
     * @param int $number
     *
     * @return mixed
     */
    public function paginate($number = 10)
    {
        return $this->model->paginate($number);
    }

    /**
     * @param        $colum
     * @param string $type
     *
     * @return mixed
     */
    public function orderBy($colum, $type = 'DESC')
    {
        return $this->model->orderBy($colum, $type);
    }

    /**
     * @param $colum
     *
     * @return mixed
     */
    public function groupBy($colum)
    {
        return $this->model->groupBy($colum);
    }

    /**
     * @return mixed
     */
    public function latest(){
        return$this->model->latest();
    }

    /**
     * @param $num
     *
     * @return mixed
     */
    public function take($num){
        return$this->model->take($num);
    }

    /**
     * @return mixed
     */
    public function onlyTrashed()
    {
        return $this->model->onlyTrashed();
    }

    /**
     * @return mixed
     */
    public function withTrashed()
    {
        return $this->model->withTrashed();
    }

    /**
     * @return mixed
     */
    public function shuffle()
    {
        return $this->model->shuffle();
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->get()->first();
    }
}