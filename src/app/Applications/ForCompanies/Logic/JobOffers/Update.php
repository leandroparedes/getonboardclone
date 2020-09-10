<?php

namespace App\Applications\ForCompanies\Logic\JobOffers;

use App\Applications\ForCompanies\Models\JobOffer;
use Illuminate\Http\Request;

trait Update
{
    /**
     * Show the form for updating a job offer
     * 
     * @return \Illuminate\Http\Response;
     */
    public function showUpdateForm(Request $request, JobOffer $jobOffer)
    {
        return view('companies::jobs.update', [
            'jobOffer' => $jobOffer
        ]);
    }
    
    /**
     * Update the job offer
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobOffer $jobOffer)
    {
        $this->validateUpdate($request);

        $jobOffer = $this->edit($jobOffer, $request->all());
        
        return redirect()->route('companies.home');
    }

    /**
     * Validates the request with the given rules
     */
    public function validateUpdate(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'slug' => ['required', 'string', 'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/']
        ]);
    }

    /**
     * Updates the job offer
     */
    public function edit(JobOffer $jobOffer, array $data)
    {
        $jobOffer->title = $data['title'];
        $jobOffer->description = $data['description'];
        $jobOffer->slug = $data['slug'];
        
        $jobOffer->save();

        return $jobOffer;
    }
}