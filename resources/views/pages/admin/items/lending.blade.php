@extends('layouts.app')

@section('title', 'Item Lending - ' . $item->name)
@section('section', 'Item Lending')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Lending data for <strong>{{ $item->name }}</strong>.</p>
        <div class="d-flex flex-row gap-2">
            <div class="px-4 py-2 bg-light rounded-3">
                <a href="{{ route('admin.items.index') }}" class="text-black fs-sm">Back</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Total</th>
                    <th scope="col">Borrower</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Date</th>
                    <th scope="col">Returned</th>
                    <th scope="col">Handle by</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lendings as $index => $lending)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $lending->total }}</td>
                        <td>{{ $lending->borrower_name }}</td>
                        <td>{{ $lending->reason }}</td>
                        <td>{{ $lending->date }}</td>
                        <td>
                            @if ($lending->returned_at)
                                <span
                                    class="badge bg-success">{{ \Carbon\Carbon::parse($lending->returned_at)->format('Y-m-d H:i') }}</span>
                            @else
                                <span class="badge bg-warning text-dark">Not Returned</span>
                            @endif
                        </td>
                        <td>{{ $lending->user->name ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-danger">No lending data found for this item.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
