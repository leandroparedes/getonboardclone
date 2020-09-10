@extends('professionals::layouts.main')

@section('title', 'Updating - ' . $jobOffer->title)

@section('content')
    <h1>Update job offer</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        {{ $jobOffer->slug }}
    <form action="{{ route('companies.jobs.update', $jobOffer->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="title" id="id-title" placeholder="job title" value="{{ $jobOffer->title }}">
        <input type="text" name="description" id="id-description" placeholder="job description" value="{{ $jobOffer->description }}">
        <input type="text" name="slug" id="id-slug" placeholder="slug" value="{{ $jobOffer->safe_slug }}">
        <input type="submit" value="Update job offer">
    </form>
@endsection