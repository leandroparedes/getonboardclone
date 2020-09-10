<?php

namespace App\Applications\Search;

trait ApplyBasicFilters
{
    protected function applyStringFilter($column, $value)
    {
        // todo revisar esto
        $this->queryBuilder->where($column, '=', $value);
    }

    protected function applyDateFilter($column, $value)
    {
        //
    }
}