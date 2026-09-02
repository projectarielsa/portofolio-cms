<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Halaman Account Settings
     */
    public function edit(Request $request)
    {
        return view('admin.account.edit', [
            'user' => $request->user(),
        ]);
    }


    /**
     * Update Email
     */
    public function updateEmail(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update([
            'email' => $validated['email'],
        ]);

        return back()->with(
            'success',
            'Email berhasil diperbarui.'
        );
    }


    /**
     * Update Password
     */
    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'current_password' => [
                'required',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Cek password lama
        |--------------------------------------------------------------------------
        */

        if (! Hash::check(
            $request->current_password,
            $user->password
        )) {
            return back()
                ->withErrors([
                    'current_password' =>
                        'Password saat ini tidak sesuai.',
                ])
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | Update password
        |--------------------------------------------------------------------------
        */

        $user->update([
            'password' => Hash::make(
                $request->password
            ),
        ]);

        return back()->with(
            'success',
            'Password berhasil diperbarui.'
        );
    }
}