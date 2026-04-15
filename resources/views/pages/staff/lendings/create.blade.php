@extends('layouts.app')

@section('title', 'Create Lending')
@section('section', 'Create Lending')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Create Lending Form</p>
    </div>

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('staff.lendings.store') }}" method="post">
        @csrf

        {{-- Main entry (index 0) --}}
        <div id="lending-entry-0" class="lending-entry">
            <label for="borrower_name_0" class="form-label fw-semibold">Name</label>
            <input type="text" name="entries[0][borrower_name]" id="borrower_name_0" class="form-control @error('entries.0.borrower_name') is-invalid @enderror mb-5" placeholder="Borrower Name">
            @error('entries.0.borrower_name')
                <div class="invalid-feedback mb-3">
                    {{ $message }}
                </div>
            @enderror

            <label for="item_id_0" class="form-label fw-semibold">Items</label>
            <select name="entries[0][item_id]" id="item_id_0" class="form-select @error('entries.0.item_id') is-invalid @enderror mb-3">
                <option selected disabled>Select Items</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->category->name }} - {{ $item->name }}</option>
                @endforeach
            </select>
            @error('entries.0.item_id')
                <div class="invalid-feedback mb-3">
                    {{ $message }}
                </div>
            @enderror

            <label for="total_0" class="form-label fw-semibold">Total</label>
            <input type="number" name="entries[0][total]" id="total_0" class="form-control @error('entries.0.total') is-invalid @enderror mb-3" placeholder="Total Item">
            @error('entries.0.total')
                <div class="invalid-feedback mb-3">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Container for additional entries --}}
        <div id="more-entries"></div>

        {{-- + more --}}
        <div class="mb-5">
            <a href="javascript:void(0)" id="btn-add-more" class="text-primary fw-semibold text-decoration-none">+ more</a>
        </div>

        <label for="reason" class="form-label fw-semibold">Reason</label>
        <input type="text" name="reason" id="reason" class="form-control @error('reason') is-invalid @enderror mb-5" placeholder="Reason Description">
        @error('reason')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <div class="d-flex gap-3 justify-content-end mt-4">
            <button type="button" onclick="history.back()" class="btn bg-light text-black py-2 fw-bold">Cancel</button>
            <button type="submit" class="btn bg-dark-blue text-white py-2 fw-bold">Create</button>
        </div>
    </form>
@endsection