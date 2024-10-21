<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;

use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:sanctum');
        // $this->middleware(['role:Superadmin|Admin']);
    }

    function dashboard()
    {
        return view('home');
    }
}
