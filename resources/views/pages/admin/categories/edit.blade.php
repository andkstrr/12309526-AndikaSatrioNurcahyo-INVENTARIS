@extends('layouts.app')

@section('title', 'Edit Category')
@section('section', 'Edit Category')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Edit Category Form</p>
    </div>

    <form action={{ route('admin.categories.update', $category->id) }} method="post">
        @csrf
        @method('PUT')

        <label for="name" class="form-label fw-semibold">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror mb-3" placeholder="Category Name" value="{{ old('name', $category->name) }}">
        @error('name')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="division" class="form-label fw-semibold">Division</label>
        <select name="division" id="division" class="form-select @error('division') is-invalid @enderror mb-3">
            <option value="sarpras" {{ old('division', $category->division) == 'sarpras' ? 'selected' : '' }}>Sarpras</option>
            <option value="tata usaha" {{ old('division', $category->division) == 'tata usaha' ? 'selected' : '' }}>Tata Usaha</option>
            <option value="jurusan" {{ old('division', $category->division) == 'jurusan' ? 'selected' : '' }}>Jurusan</option>
        </select>
        @error('division')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <div class="d-flex gap-3 justify-content-end mt-4">
            <a href="{{ url()->previous() }}" class="btn bg-light text-black py-2 fw-bold">Back</a>
            <button type="submit" class="btn bg-dark-blue text-white py-2 fw-bold">Update</button>
        </div>
    </form>
@endsection