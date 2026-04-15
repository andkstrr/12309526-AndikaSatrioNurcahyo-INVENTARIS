@extends('layouts.app')

@section('title', 'Edit Item')
@section('section', 'Edit Item')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Edit Item Form</p>
    </div>

    <form action="{{ route('admin.items.update', $item->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="name" class="form-label fw-semibold">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror mb-5"
            placeholder="Item Name" value="{{ old('name', $item->name) }}">
        @error('name')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="category" class="form-label fw-semibold">Category</label>
        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror mb-3">
            <option selected disabled>Select Category</option>
            @foreach ($categories as $index => $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="total" class="form-label fw-semibold">Total</label>
        <input type="number" name="total" id="total" class="form-control @error('total') is-invalid @enderror mb-5" placeholder="Total Item"
            value="{{ old('total', $item->total) }}">
        @error('total')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="repair" class="form-label fw-semibold">New Broke Item <span
                class="text-sm fw-normal text-warning">(currenty: {{ $item->repair }})</span></label>
        <input type="number" name="repair" id="repair" class="form-control  mb-5" placeholder="Total Repair"
            value={{ old('repair', $item->repair) }}>

        <div class="d-flex gap-3 justify-content-end mt-4">
            <a href="{{ url()->previous() }}" class="btn bg-light text-black py-2 fw-bold">Cancel</a>
            <button type="submit" class="btn bg-dark-blue text-white py-2 fw-bold">Update</button>
        </div>
    </form>
@endsection