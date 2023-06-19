@extends('layouts.app')

@push('css')
    <style>
        .message {
            padding: 20px;
            background-color: rgba(0,0,0,0.04);
        }
    </style>
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Payment Page
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-responsive mb-4">
                        <tbody>
                            <tr>
                                <td>Matric No.:</td>
                                <td>{{ $clearance->student->matric_no }}</td>
                            </tr>
                            <tr>
                                <td>Fullname:</td>
                                <td>{{ $clearance->student->firstname . " " . $clearance->student->middlename . " " . $clearance->student->surname }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="message">
                        <table class="table table-striped table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td>Department.:</td>
                                    <td>{{ $clearance->student->department->name }}</td>
                                </tr>
                                <tr>
                                    <td>Payment ID:</td>
                                    <td>{{ strtoupper($trxRef) }}</td>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td>{{ $clearance->student->firstname . " " . $clearance->student->surname }}</td>
                                </tr>
                                <tr>
                                    <td>Matric No.:</td>
                                    <td>{{ $clearance->student->matric_no }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="buts mt-5">
                        <div class="btn-group">
                            <a href="{{ route('complains.create') }}" class="btn btn-danger btn-block">Complain</a>
                            <a href="#" class="btn btn-warning btn-block">Print Receipt</a>
                            <a href="{{ route('home') }}" class="btn btn-primary btn-block">Personal Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
