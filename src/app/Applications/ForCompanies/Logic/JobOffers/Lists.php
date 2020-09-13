<?php

namespace App\Applications\ForCompanies\Logic\JobOffers;

use App\Applications\ForCompanies\Models\JobOffer;
use App\Applications\Search\SearchFacade as Search;
use Illuminate\Http\Request;

trait Lists
{
    /**
     * Return the list of job offers
     * 
     * @return \Illuminate\Http\Response;
     */
    public function index(Request $request, JobOffer $jobOffer)
    {
        $searchResult = Search::model(new JobOffer)->from($request->query())->get();
        
        return view('companies::jobs.index', [
            'jobOffers' => $searchResult
        ]);
    }

    public function show(Request $request, JobOffer $jobOffer)
    {
        return view('companies::jobs.show', [
            'jobOffer' => $jobOffer
        ]);
    }
}