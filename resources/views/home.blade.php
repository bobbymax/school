@extends('layouts.app')

@push('css')
    <style>
        .payment__bttns {
            display: block;
            margin-bottom: 0.78rem;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bio Data') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table-responsive table-bordered table table-striped">
                        <tbody>
                            <tr>
                                <td>Matriculation Number:</td>
                                <td>{{ auth()->user()->matric_no }}</td>
                            </tr>
                            <tr>
                                <td>Fullname:</td>
                                <td>{{ auth()->user()->firstname . " " . auth()->user()->middlename . " " . auth()->user()->surname }}</td>
                            </tr>
                            <tr>
                                <td>Level:</td>
                                <td>{{ auth()->user()->level_id > 0 ? auth()->user()->level->key : 0 }}</td>
                            </tr>
                            <tr>
                                <td>Department:</td>
                                <td>{{ auth()->user()->department_id > 0 ? auth()->user()->department->name : "Not Set" }}</td>
                            </tr>
                            <tr>
                                <td>Program:</td>
                                <td>{{ auth()->user()->program_id > 0 ? auth()->user()->program->name : "Not Set" }}</td>
                            </tr>
                            <tr>
                                <td>Mobile Number:</td>
                                <td>{{ auth()->user()->mobile }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Get Clearance Access
                </div>
                <div class="card-body">
                    <a class="payment__bttns" href="{{ route('access.fee') }}">Pay Clearance Access Fee</a>
                    <a class="payment__bttns" href="{{ route('check.clearance', 'result') }}">Print Results</a>
                    <a class="payment__bttns" href="{{ route('check.clearance', 'hostel') }}">Hostel Clearance</a>
                    <a class="payment__bttns" href="{{ route('check.clearance', 'clinic') }}">Clinic Clearance</a>
                    <a class="payment__bttns" href="#">Busary Clearance</a>
                    <a class="payment__bttns" href="{{ route('check.clearance', 'college') }}">College Clearance</a>
                    <a class="payment__bttns" href="#">Library Clearance</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Personal Menu:
                </div>
                <div class="card-body">
                    <a class="payment__bttns" href="#">Senate Clearance</a>
                    <a class="payment__bttns" href="#">Student Friendship Clearance</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
