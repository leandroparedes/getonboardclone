<?php

namespace App\Applications\Search;

use Illuminate\Database\Eloquent\Model;

class Search
{
    use InteractsWithFilters;

    /**
     * The model that we are going to use as base
     * for the search
     * 
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * The raw query string that contains the filters
     * 
     * @var array;
     */
    protected $queryString;

    /**
     * The QueryBuilder instance
     * 
     * @var \Illuminate\Database\Query\Builder // todo revisar
     */
    protected $queryBuilder;

    /**
     * Set the Eloquent model
     * 
     * @param \Illuminate\Database\Eloquent\Model
     * @return Search
     */
    public function model(Model $model)
    {
        $this->model = $model;

        $this->queryBuilder = $this->model->searchableQueryBuilder();

        return $this;
    }

    /**
     * Establish the source of the filters
     * 
     * @param array $queryString
     * @return Search
     */
    public function from(array $queryString)
    {
        $this->queryString = $queryString;

        return $this;
    }

    /**
     * Call any QueryBuilder available method.
     * 
     * @return $mixed
     */
    public function __call($name, $arguments)
    {
        $this->applyFilters();
        
        return $this->queryBuilder->$name(...$arguments);
    }
}