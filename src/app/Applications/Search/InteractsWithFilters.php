<?php

namespace App\Applications\Search;

trait InteractsWithFilters
{
    use ApplyBasicFilters;

    /**
     * Compares the filters with a whitelist and leave the matches
     */
    protected function parseFilters()
    {
        $originalFilters = $this->request->query();

        $whitelist = $this->model->availableFilters();

        $filters = [];

        foreach ($originalFilters as $column => $value) {
            if (array_key_exists($column, $whitelist)) {
                array_push($filters, [
                    'column' => $column,
                    'value' => $value,
                    'type' => $whitelist[$column],
                ]);
            }
        }

        $this->filters = $filters;
    }

    protected function applyFilters()
    {
        $this->parseFilters();

        foreach ($this->filters as $filter) {
            $method = 'apply'.ucwords($filter['type']).'Filter';

            if (method_exists($this, $method)) {
                $this->$method($filter['column'], $filter['value']);
            }
        }
    }
}