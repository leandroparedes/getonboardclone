@extends('companies::layouts.main')

@section('title', 'Delete')
    
@section('content')
<h1>Eliminar {{ $jobOffer->title }}</h1>
<a href="{{ route('companies.jobs.delete', $jobOffer->slug) }}" onclick="event.preventDefault();document.getElementById('delete-job-form').submit();">
    delete job
</a>
<form action="{{ route('companies.jobs.delete', $jobOffer->slug) }}" method="POST" id="delete-job-form" style="display:none">
    @csrf
    @method('DELETE')
</form>
@endsection