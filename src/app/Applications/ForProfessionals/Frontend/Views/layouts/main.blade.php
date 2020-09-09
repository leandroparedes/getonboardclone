@extends('layouts.base')

@section('title', 'For Profesionals')

@section('base-content')
    <div id="professionals-app">
        @yield('content')
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/professionals/app.professionals.js') }}"></script>
@endpush