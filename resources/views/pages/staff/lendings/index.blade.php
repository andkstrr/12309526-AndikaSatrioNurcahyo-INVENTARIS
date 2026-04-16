@extends('layouts.app')

@section('title', 'Dashboard Lendings')
@section('section', 'Lendings')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Manage and organize your lending items.</p>
        <div class="d-flex flex-row gap-2">
            <div class="px-4 py-2 bg-success rounded-3">
                <a href="{{ route('staff.lendings.export') }}" class="text-white fs-sm">Export to Excel</a>
            </div>
            <div class="px-4 py-2 bg-dark-blue rounded-3">
                <a href="{{ route('staff.lendings.create') }}" class="text-white fs-sm">+ Lending</a>
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
                    <th scope="col">Item</th>
                    <th scope="col">Total</th>
                    <th scope="col">Name</th>
                    <th scope="col">Info</th>
                    <th scope="col">Date</th>
                    <th scope="col">Returned</th>
                    <th scope="col">Handle By</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    use Carbon\Carbon;
                @endphp
                @forelse ($lendings as $index => $lending)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $lending->item->name }}</td>
                        <td>{{ $lending->total }}</td>
                        <td>{{ $lending->borrower_name }}</td>
                        <td>{{ $lending->reason }}</td>
                        <td>{{ Carbon::parse($lending->date)->translatedFormat('j F Y') }}</td>
                        <td>
                            @if ($lending->returned_at)
                                {{ Carbon::parse($lending->returned_at)->translatedFormat('j F Y') }}
                            @else
                                <span class="text-danger">Not returned</span>
                            @endif
                        </td>
                        <td>
                            <div>{{ $lending->handledBy->name ?? '-' }}</div>
                            @if ($lending->returnedBy)
                                <div class="small">Returned by: {{ $lending->returnedBy->name }}</div>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                @if (!$lending->returned_at)
                                    <form action="{{ route('staff.lendings.update', $lending->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-warning">Return</button>
                                    </form>
                                @endif

                                <form action="{{ route('staff.lendings.destroy', $lending->id) }}" method="POST"
                                    onsubmit="alert('Are you sure want to delete this lending data?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-5 text-danger">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
