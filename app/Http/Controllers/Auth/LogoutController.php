<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        $user = Auth::user();
    
        // Revoke all tokens for the authenticated user
        $user->tokens()->delete();
    
        // Optionally, you may also want to logout the user from the session
        Auth::logout();
    
        return response()->json(['message' => 'Logged out successfully']);
    }
}
