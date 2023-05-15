<?php

namespace App\Http\Controllers;

use App\Rules\TokyoAddress;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email:filter', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8'],
            'address' => [new TokyoAddress($request->input('pref'))]

        ]);
    }
}
