<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AccountsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Password',
        ];
    }

    public function map($user): array
    {
        $defaultPassword = substr($user->email, 0, 4) . $user->id;

        if ($user->plain_password === $defaultPassword) {
            $passwordDisplay = $user->plain_password;
        } else {
            $passwordDisplay = 'This account already edited the password';
        }

        return [
            $user->name,
            $user->email,
            $passwordDisplay,
        ];
    }
}
