@extends('layouts.app')

@section('title', 'Dashboard Staff Accounts')
@section('section', 'Staff Accounts')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Manage and organize your staff accounts.</p>
        <div class="d-flex flex-row gap-2">
            <div class="px-4 py-2 bg-success rounded-3">
                <a href="{{ route('admin.accounts.staff.export') }}" class="text-white fs-sm">Export to Excel</a>
            </div>
            <div class="px-4 py-2 bg-dark-blue rounded-3">
                <a href="{{ route('admin.accounts.admin.create') }}" class="text-white fs-sm">+ Add Account</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($accounts as $index => $account)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->email }}</td>
                        <td>
                            <form action="{{ route('admin.accounts.staff.reset_password', $account->id) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure want to reset password this account?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning">Reset Password</button>
                            </form>
                            <form action="{{ route('admin.accounts.admin.destroy', $account->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Are you sure want to delete this account?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No staff accounts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
