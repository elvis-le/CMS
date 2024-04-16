<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->has('remember_me')) {
            config(['session.lifetime' => 60 * 24 * 30]);
        } else {
            config(['session.lifetime' => 1]);
        }


        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->email_verified_at === null) {
            $user->sendEmailVerificationNotification();
            return redirect(route('verification.notice'));
        } else {
        if (Auth::user()->roles_id == 1){
            return redirect('/marketing-manager/home')->with('status', 'MM Login successful');
        }
        else if (Auth::user()->roles_id == 2){
            return redirect('/marketing-coordinator/home')->with('status', 'MC Login successful');
        }
        else if (Auth::user()->roles_id == 3){
            return redirect('/administrators/home')->with('status', 'Admin Login successful');
        }
        else if (Auth::user()->roles_id == 4){
            return redirect('/student/index')->with('status', 'User Login successful');
        }
        else if (Auth::user()->roles_id == 5){
            return redirect('/guest/home')->with('status', 'Guest Login successful');
        }
        else{
            return redirect('/')->with('status', 'Login successful');
        }

        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
