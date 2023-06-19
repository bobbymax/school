<?php

namespace App\Http\Controllers;

use App\Models\Clearance;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClearanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'payment_session' => 'required',
            'payment_level' => 'required',
            'payment_type' => 'required',
            'payment_method' => 'required',
        ]);

        $clearance = Clearance::create([
            'name' => 'Clearance Payment',
            'payment_session' => $request->payment_session,
            'payment_level' => $request->payment_level,
            'payment_type' => $request->payment_type,
            'payment_method' => $request->payment_method,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('clearances.show', ['clearance' => $clearance]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Clearance $clearance): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('clearance.show', compact('clearance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clearance $clearance): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $trxRef = Str::random(12);
        return view('clearance.edit', compact('clearance', 'trxRef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clearance $clearance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clearance $clearance)
    {
        //
    }
}
