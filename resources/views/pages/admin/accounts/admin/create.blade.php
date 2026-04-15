@extends('layouts.app')

@section('title', 'Create Account')
@section('section', 'Create Account')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Add Account Form</p>
    </div>

    <form action="{{ route('admin.accounts.admin.store') }}" method="POST">
        @csrf
        <label for="name" class="form-label fw-semibold">Name</label>
        <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror mb-5"
            placeholder="User Name">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="email" class="form-label fw-semibold">Email</label>
        <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror  mb-5"
            placeholder="User Email">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="role" class="form-label fw-semibold">Role</label>
        <select name="role" id="role" class="form-select  @error('role') is-invalid @enderror  mb-3">
            <option selected disabled>Select Role</option>
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
        </select>
        @error('role')
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
