<?php

namespace App\Applications\ForCompanies\Logic\JobOffers;

use App\Applications\ForCompanies\Models\JobOffer;
use Illuminate\Http\Request;

trait Delete
{
    /**
     * Return the confirmation view for deleting a job offer
     * 
     * @return \Illuminate\Http\Response;
     */
    public function showDeleteView(Request $request, JobOffer $jobOffer)
    {
        return view('companies::jobs.delete', [
            'jobOffer' => $jobOffer
        ]);
    }

    /**
     * Deletes the job offer permanently
     */
    public function delete(Request $request, JobOffer $jobOffer)
    {
        $this->validateDelete($request);

        $jobOffer->delete();

        return redirect()->route('companies.home');
    }

    /**
     * Check if the job offer can be deleted
     */
    public function validateDelete(Request $request)
    {
        //
    }
}