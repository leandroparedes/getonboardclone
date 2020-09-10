<?php

namespace App\Applications\Search;

trait InteractsWithFilters
{
    use ApplyBasicFilters;

    /**
     * Parses the filters from the raw query string
     * 
     * @return array
     */
    protected function parseFilters()
    {
        $whitelist = $this->model->availableFilters();

        $filters = [];

        foreach ($this->queryString as $column => $value) {
            if (array_key_exists($column, $whitelist)) {
                array_push($filters, [
                    'column' => $column,
                    'value' => $value,
                    'type' => $whitelist[$column],
                ]);
            }
        }

        return $filters;
    }

    protected function applyFilters()
    {
        $filters = $this->parseFilters();

        foreach ($filters as $filter) {
            $method = 'apply'.ucwords($filter['type']).'Filter';

            if (method_exists($this, $method)) {
                $this->$method($filter['column'], $filter['value']);
            }
        }
    }
}