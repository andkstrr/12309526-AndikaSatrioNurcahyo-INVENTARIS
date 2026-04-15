@extends('layouts.app')

@section('title', 'Dashboard Categories')
@section('section', 'Categories')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Manage and organize your inventory categories.</p>
        <div class="px-4 py-2 bg-dark-blue rounded-3">
            <a href="{{ route('admin.categories.create') }}" class="text-white fs-sm">+ Add Categories</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Division</th>
                    <th scope="col">Total Items</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-uppercase">{{ $category->division }}</td>
                        <td>{{ $category->items_sum_total ?? 0 }}</td>
                        <td><a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-danger">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection