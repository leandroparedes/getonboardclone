<?php

namespace App\Applications\ForCompanies\Models;

use App\Applications\Search\Interfaces\SearchableInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobOffer extends Model implements SearchableInterface
{   
    protected $guarded = [];

    /**
     * Get the slug without the last portion of the string,
     * which is a random string provided for uniqueness.
     */
    public function getSafeSlugAttribute()
    {
        // mover esto a algo mas generico
        $splitted = explode('-', $this->slug);

        if (count($splitted) === 1) return $this->slug;

        array_pop($splitted);

        return join('-', $splitted);
    }

    /**
     * Append a random string to the slug for ensure uniqueness
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value . '-' . Str::random();
    }

    // SearchableInterface methods implementation

    /**
     * List of filters availables for search and filtering in
     * format column => dataType
     * 
     * @return array
     */
    public function availableFilters()
    {
        return [
            'title' => 'string',
            'description' => 'string',
            'created_at' => 'date'
        ];
    }

    /**
     * The query builder used for search and filtering
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function searchableQueryBuilder()
    {
        return $this->query();
    }
}
