<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('email', $request->email)->first();
            if ($user->roles[0]->name == 'superadmin' || $user->roles[0]->name == 'admin') {
                return redirect()->intended(route('beranda'));
            } else {
                return redirect()->intended(route('home'));
            }             
        }
        return redirect()->back()->with('error', 'Gagal Login. Pastikan email dan password anda benar.');
    }
}
