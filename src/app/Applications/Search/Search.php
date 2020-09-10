<?php

namespace App\Applications\Search;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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
     * Request that contains the filters to be applied
     * 
     * @var \Illuminate\Http\Request;
     */
    protected $request;

    /**
     * Array of valid filters to be applied
     * 
     * @var array
     */
    protected $filters;

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
     * @param \Illuminate\Http\Request
     * @return Search
     */
    public function from(Request $request)
    {
        $this->request = $request;

        $this->applyFilters(); // where to put this

        return $this;
    }

    /**
     * Set a custom QueryBuilder.
     * 
     * @param \Illuminate\Database\Eloquent\Builder
     */
    public function query(Builder $builder)
    {
        $this->queryBuilder = $builder;
        
        return $this;
    }

    /**
     * Return the QueryBuilder instance
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    /**
     * Call any QueryBuilder available method.
     * 
     * @return $mixed
     */
    public function __call($name, $arguments)
    {
        return $this->queryBuilder->$name(...$arguments);
    }
}