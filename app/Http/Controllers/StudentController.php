<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $students = User::latest()->all();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $departments = Department::latest()->all();
        return view('students.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'matric_no' => 'required|string|max:255|unique:users',
            'level_id' => 'required|integer',
            'department_id' => 'required|integer',
            'program_id' => 'required|integer',
            'email' => 'required|string|max:255|unique:users',
        ]);

        $student = User::create([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'middlename' => $request->middlename,
            'matric_no' => $request->matric_no,
            'level_id' => $request->level_id,
            'department_id' => $request->department_id,
            'program_id' => $request->program_id,
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('students.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $departments = Department::latest()->all();
        return view('students.create', compact('departments', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'level_id' => 'required|integer',
            'department_id' => 'required|integer',
            'program_id' => 'required|integer',
            'email' => 'required|string|max:255',
        ]);

        $user->update([
            'firstname' => $request->firstname,
            'surname' => $request->surname,
            'middlename' => $request->middlename,
            'level_id' => $request->level_id,
            'department_id' => $request->department_id,
            'program_id' => $request->program_id,
            'email' => $request->email,
        ]);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();
        return redirect()->route('students.index');
    }
}
