<?php

namespace App\Applications\ForCompanies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobOffer extends Model
{   
    protected $guarded = [];

    /**
     * Get the slug without the last portion of the string,
     * which is a random string provided for uniqueness.
     */
    public function getSafeSlugAttribute()
    {
        $splitted = explode('-', $this->slug);

        if (count($splitted) === 1) return $this->slug;

        array_pop($splitted);

        return join('-', $splitted);
    }

    /**
     * Append a random string to the slug for ensure
     * uniqueness
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value . '-' . Str::random();
    }
}
