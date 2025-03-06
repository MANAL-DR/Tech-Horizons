<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Theme;

class VerifiedDashboard extends Controller
{
    function verifyDashboard(){
        $user=Auth::user();
        $role=$user->role;

        if($role=="subscriber"){
            $themes = Theme::whereHas('subscriptions', function($query) use ($user) {
            $query->where('user_id', $user->id); })->get();
            return view('dashboards.subscriber',compact('themes'));
        }
        elseif($role==='theme_manager'){
            $theme = $user->managedTheme;
            return view('dashboards.manager',compact('theme'));
        }elseif($role==='editor'){
            return view('dashboards.editor');
        }
        
    }
}
