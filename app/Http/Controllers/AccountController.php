<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Exports\AccountsExport;
use Maatwebsite\Excel\Facades\Excel;

class AccountController extends Controller
{
    public function index_admin()
    {
        $accounts = User::all();

        return view('pages.admin.accounts.admin.index', compact('accounts'));
    }

    public function index_staff()
    {
        $accounts = User::where('role', 'staff')->get();

        return view('pages.admin.accounts.staff.index', compact('accounts'));
    }

    public function create()
    {
        return view('pages.admin.accounts.admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,staff',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make('password'),
        ]);

        $plainPassword = substr($validated['email'], 0, 4) . $user->id;

        $user->update([
            'password' => Hash::make($plainPassword),
            'plain_password' => $plainPassword
        ]);

        return redirect()->route('admin.accounts.admin.index')->with('success', 'Account created successfully. Password: ' . $plainPassword);
    }

    public function edit(Request $request, User $user)
    {
        $account = User::findOrFail($user->id);

        return view('pages.admin.accounts.admin.edit', compact('account'));
    }

    public function edit_staff(Request $request, User $user)
    {
        $account = User::findOrFail($user->id);

        return view('pages.staff.users.index', compact('account'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required|in:admin,staff',
            'password' => 'nullable|min:4',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.accounts.admin.index')->with('success', 'Account updated successfully.');
    }

    public function update_staff(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:4',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('staff.accounts.edit', $user->id)->with('success', 'Account updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.accounts.admin.index')->with('success', 'Account deleted successfully.');
    }

    public function reset_password(User $user)
    {
        $plainPassword = substr($user->email, 0, 4) . $user->id;

        $user->update([
            'password' => Hash::make($plainPassword),
            'plain_password' => $plainPassword
        ]);

        return redirect()->route('admin.accounts.staff.index')->with('success', 'Password reset successfully. New Password: ' . $plainPassword);
    }

    public function export()
    {
        return Excel::download(new AccountsExport, 'accounts.xlsx');
    }
}
