@extends('professionals::layouts.main')

@section('title', 'Create a new Job Offer')

@section('content')
    <h1>Create job offer</h1>
    
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('companies.jobs.store') }}" method="POST">
        @csrf
        <input type="text" name="title" id="id-title" placeholder="job title">
        <input type="text" name="description" id="id-description" placeholder="job description">
        <input type="text" name="slug" id="id-slug" placeholder="slug">
        <input type="submit" value="Create job offer">
    </form>
@endsection