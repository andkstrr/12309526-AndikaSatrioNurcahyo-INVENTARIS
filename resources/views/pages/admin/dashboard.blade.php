@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('section', 'Dashboard Admin')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <div class="d-flex flex-column align-items-start">
            <h3 class="h3">Welcome back, {{ Auth::user()->name }}!</h3>
            <p class="text-muted small mb-0">Here's an overview of the categories, items and accounts</p>
        </div>
        <p class="fw-medium fs-5 mb-0">{{ now()->format('d M Y') }}</p>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-3 mb-5">
            <x-dashboard-card title="Total Categories" value="{{ $total_categories }}" />
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-5">
            <x-dashboard-card title="Total Items" value="{{ $total_items }}" />
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-5">
            <x-dashboard-card title="Total Lendings" value="{{ $total_lendings }}" />
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-5">
            <x-dashboard-card title="Borrowed Items" value="{{ $total_borrowed_items }}" />
        </div>
    </div>
@endsection
