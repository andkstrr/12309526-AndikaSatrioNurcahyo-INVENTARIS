@extends('layouts.app')

@section('title', 'Dashboard Items')
@section('section', 'Items')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Manage and organize your items data.</p>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Available</th>
                    <th scope="col">Lending Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $index => $item)
                    @php
                        $lendingTotal = $item->activeLendingsTotal();
                        $available = $item->total - $item->repair - $lendingTotal;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $available }}</td>
                        <td>{{ $lendingTotal }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-danger">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
