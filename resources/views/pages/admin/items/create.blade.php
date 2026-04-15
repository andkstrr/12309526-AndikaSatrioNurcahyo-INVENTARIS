@extends('layouts.app')

@section('title', 'Create Item')
@section('section', 'Create Item')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Add Item Form</p>
    </div>

    <form action="{{ route('admin.items.store') }}" method="post">
        @csrf
        <label for="name" class="form-label fw-semibold">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror mb-5" placeholder="Item Name">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="category_id" class="form-label fw-semibold">Category</label>
        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror mb-3">
            <option selected disabled>Select Category</option>
            @foreach ($categories as $index => $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="total" class="form-label fw-semibold">Total</label>
        <input type="number" name="total" id="total" class="form-control @error('total') is-invalid @enderror mb-5" placeholder="Total Item">
        @error('total')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="d-flex gap-3 justify-content-end mt-4">
            <a href="{{ url()->previous() }}" class="btn bg-light text-black py-2 fw-bold">Cancel</a>
            <button type="submit" class="btn bg-dark-blue text-white py-2 fw-bold">Save</button>
        </div>
    </form>
@endsection