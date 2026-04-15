@extends('layouts.app')

@section('title', 'Dashboard Staaff')
@section('section', 'Dashboard Staff')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <div class="d-flex flex-column align-items-start">
            <h3 class="h3">Welcome back, {{ Auth::user()->name }}!</h3>
            <p class="text-muted small mb-0">Here's an overview of the available items, total lendings and categories</p>
        </div>
        <p class="fw-medium fs-5 mb-0">{{ now()->format('d M Y') }}</p>
    </div>

    <div class="row">
        <div class="col-12 col-md-4 col-lg-4 mb-5">
            <x-dashboard-card title="Available Items" value="{{ $total_available }}" />
        </div>
        <div class="col-12 col-md-4 col-lg-4 mb-5">
            <x-dashboard-card title="Items on Lend" value="{{ $total_lendings }}" />
        </div>
        <div class="col-12 col-md-4 col-lg-4 mb-5">
            <x-dashboard-card title="Total Categories" value="{{ $total_categories }}" />
        </div>
    </div>
@endsection
