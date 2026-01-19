<?php

namespace App\Http\Controllers\Auth;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class TeacherRegisteredUserController
{
    public function create(): View
    {
        return view('auth.teacher-register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'max:255', 'unique:teachers,email'],
            'password'   => ['required', 'confirmed', Password::min(8)],
        ]); // "confirmed" attend un champ password_confirmation :contentReference[oaicite:0]{index=0}

        // Ne pas Hash::make ici si tu as le cast 'password' => 'hashed'
        $teacher = new Teacher();
        $teacher->first_name = $validated['first_name'];
        $teacher->last_name  = $validated['last_name'];
        $teacher->email      = $validated['email'];
        $teacher->password   = $validated['password'];
        $teacher->save();

        Auth::guard('teacher')->login($teacher);
        $request->session()->regenerate(); // login session-based :contentReference[oaicite:1]{index=1}

        return redirect()->route('teacher.dashboard');
    }
}
