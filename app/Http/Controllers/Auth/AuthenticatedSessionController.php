<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    
    public function store(LoginRequest $request): RedirectResponse
    {
       
        if (Auth::attempt($request->only('email', 'password'))) {
            
            $request->session()->regenerate();

           
            return redirect()->intended(route('home')); 
        }

        return redirect('/')->with('error', 'Email atau Password salah, harap coba lagi!');
    }


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
