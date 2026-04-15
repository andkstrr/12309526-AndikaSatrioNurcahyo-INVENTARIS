@extends('layouts.app')

@section('title', 'Edit Account')
@section('section', 'Edit Account')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Edit Account Form</p>
    </div>

    <form action="{{ route('admin.accounts.admin.update', $account->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name" class="form-label fw-semibold">Name</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror mb-5"
            placeholder="User Name" value="{{ old('name', $account->name) }}">
        @error('name')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="email" class="form-label fw-semibold">Email</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror mb-5"
            placeholder="User Email" value="{{ old('email', $account->email) }}">
        @error('email')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="role" class="form-label fw-semibold">Role</label>
        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror mb-3">
            <option value="admin" {{ old('role', $account->role == 'admin' ? 'selected' : '') }}>Admin</option>
            <option value="staff" {{ old('role', $account->role == 'staff' ? 'selected' : '') }}>Staff</option>
        </select>
        @error('role')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
        @enderror

        <label for="password" class="form-label fw-semibold">New Password <span
                class="text-sm fw-normal text-warning">(optional)</span></label>
        <input type="password" name="password" id="password" class="form-control mb-5" placeholder="--------">

        <div class="d-flex gap-3 justify-content-end mt-4">
            <button type="close" class="btn bg-light text-black py-2 fw-bold">Cancel</button>
            <button type="submit" class="btn bg-dark-blue text-white py-2 fw-bold">Save</button>
        </div>
    </form>
@endsection
