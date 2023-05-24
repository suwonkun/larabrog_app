<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserLoginController extends Controller
{
    public function index()
    {
        return view('mypage.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email:filter'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect('mypage');
        }

        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが間違っています。',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('mypage/login')->with('message', 'ログアウトしました');
    }
}
