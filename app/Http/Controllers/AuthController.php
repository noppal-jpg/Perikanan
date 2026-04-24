<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && $this->checkPassword($request->password, $user->password)) {
            Auth::login($user, $request->boolean('remember'));
            $request->session()->regenerate();

            if (! $this->isBcryptHash($user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
            }

            if (strtolower($user->role) === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('staff.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    private function isBcryptHash(string $value): bool
    {
        return preg_match('/^\$2[ayb]\$.{56}$/', $value) === 1;
    }

    private function checkPassword(string $plainText, string $storedPassword): bool
    {
        if ($this->isBcryptHash($storedPassword)) {
            return Hash::check($plainText, $storedPassword);
        }

        return hash_equals($plainText, $storedPassword);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}