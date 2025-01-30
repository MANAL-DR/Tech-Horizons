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
    public function create(Request $request): View
    {
        ;
        if($request->is('login/subscriber')){
            $role='subscriber';
        }elseif($request->is('login/manager')){
            $role='theme_manager';
        }else{
            $role='editor';
        }
        return view('auth.login',['role'=>$role]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        
        $request->authenticate();

        $expectedRole=$request->role;
        $user= Auth::user();
        $role=$user->role;

        if($user->role !== $expectedRole){

            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            $request->session()->put('login_error', 'Are you sure you are '.$expectedRole.' ?');

            return redirect()->route('access');

        }
        else{
        $request->session()->regenerate();

        //return redirect()->intended(route('dashboard.'.$role, absolute: false));
        
        return redirect()->intended(route('dashboard', absolute: false));
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
