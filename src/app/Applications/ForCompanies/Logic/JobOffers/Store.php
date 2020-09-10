<?php

namespace App\Applications\ForCompanies\Logic\JobOffers;

use App\Applications\ForCompanies\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait Store
{
    /**
     * Show the form for creating a new job offer
     * 
     * @return \Illuminate\Http\Response;
     */
    public function showCreateForm(Request $request)
    {
        return view('companies::jobs.create');
    }
    
    /**
     * Store the new created job offer
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);

        $jobOffer = $this->create($request->all());
        
        return redirect()->route('companies.home');
    }

    /**
     * Validates the request with the given rules
     */
    public function validateStore(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'slug' => ['required', 'string', 'max:255', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/']
        ]);
    }

    /**
     * Create a new job offer
     */
    public function create(array $data)
    {
        return JobOffer::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'slug' => $data['slug'],
            'company_id' => $this->guard()->id()
        ]);
    }
}