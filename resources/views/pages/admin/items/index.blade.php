@extends('layouts.app')

@section('title', 'Dashboard Items')
@section('section', 'Items')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Manage and organize your inventory items.</p>
        <div class="d-flex flex-row gap-2">
            <div class="px-4 py-2 bg-success rounded-3">
                <a href="{{ route('admin.items.export') }}" class="text-white fs-sm">Export to Excel</a>
            </div>
            <div class="px-4 py-2 bg-dark-blue rounded-3">
                <a href="{{ route('admin.items.create') }}" class="text-white fs-sm">+ Add Items</a>
            </div>
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
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Repair</th>
                    <th scope="col">Lending</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->repair }}</td>
                        <td>
                            <a href="{{ route('admin.items.lending', $item->id) }}" class="text-primary fw-semibold text-decoration-underline">
                                {{ $item->activeLendingsTotal() }}
                            </a>
                        </td>
                        <td><a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-warning">Edit</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-danger">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection