<?php

namespace App\Applications\Search\Interfaces;

interface SearchableInterface
{
    /**
     * List of filters availables for search and filtering
     */
    public function availableFilters();

    /**
     * The base query builder
     */
    public function searchableQueryBuilder();
}
