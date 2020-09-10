<?php

namespace App\Applications\Search;

trait ApplyBasicFilters
{
    protected function applyStringFilter($column, $value)
    {
        $this->queryBuilder->where($column, 'like', '%'.$value.'%');
    }
}