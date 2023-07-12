<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function clearance(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();
        return view('clearance.index', compact('user'));
    }

    public function checkers($type): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $levels = Level::all();
        $status = match ($type) {
            'result' => 'print',
            'hostel' => 'paid',
            'clinic', 'college' => 'not owing'
        };

        return view('clearance.status', compact('levels', 'status', 'type'));
    }
}
