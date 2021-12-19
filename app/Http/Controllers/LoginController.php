<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function logout(Request $request) 
    {
        if (Auth::check()) {
            Auth::logout();
    
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        }
    
        return redirect('/login');
    
    }
}
