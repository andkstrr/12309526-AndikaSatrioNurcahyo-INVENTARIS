@extends('layouts.app')

@section('title', 'Dashboard Admin Accounts')
@section('section', 'Admin Accounts')

@section('content')
    <div class="d-flex flex-row justify-content-between align-items-center mb-7">
        <p class="fs-6 mb-0">Manage and organize your admin accounts.</p>
        <div class="d-flex flex-row gap-2">
            <div class="px-4 py-2 bg-success rounded-3">
                <a href="{{ route('admin.accounts.admin.export') }}" class="text-white fs-sm">Export to Excel</a>
            </div>
            <div class="px-4 py-2 bg-dark-blue rounded-3">
                <a href="{{ route('admin.accounts.admin.create') }}" class="text-white fs-sm">+ Add Account</a>
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endsession

    @session('error')
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endsession

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
                @foreach ($accounts as $index => $account)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->email }}</td>
                        <td>
                            <a href={{ route('admin.accounts.admin.edit', $account->id) }} class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.accounts.admin.destroy', $account->id) }}" method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this account?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection