@extends('layouts.base')

@section('title', 'For Companies')

@section('base-content')
    <div id="companies-app">
        @yield('content')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/companies/app.companies.js') }}"></script>
@endpush