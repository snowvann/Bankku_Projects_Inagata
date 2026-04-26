@extends('layouts.app')
@section('title', $title ?? 'Page')
@section('page-title', $title ?? 'Page')

@section('content')
<div class="card flex flex-col items-center justify-center py-24">
    <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mb-5">
        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="1.5"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
    </div>
    <h2 class="text-xl font-700 text-slate-700 mb-2" style="font-weight:700;">{{ $title ?? 'Page' }}</h2>
    <p class="text-slate-400 text-sm max-w-sm text-center">This section is under construction. The full implementation would include all features for {{ strtolower($title ?? 'this module') }}.</p>
    <a href="{{ route('dashboard') }}" class="btn-primary mt-6">← Back to Dashboard</a>
</div>
@endsection
