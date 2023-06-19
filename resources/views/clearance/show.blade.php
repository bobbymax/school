@extends('layouts.app')

@push('css')
    <style>
        .description {
            text-align: center;
            background-color: beige;
            padding: 0.98rem;
        }

        .description p {
            margin-bottom: 0;
        }

        .description h5 {
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 0.98rem;
        }
    </style>

@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Payment Details
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-striped mb-4">
                        <tbody>
                            <tr>
                                <td>Matric Number:</td>
                                <td>{{ $clearance->student->matric_no }}</td>
                            </tr>
                            <tr>
                                <td>Fullname:</td>
                                <td>{{ $clearance->student->firstname . " " . $clearance->student->middlename . " " . $clearance->student->surname }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="description mb-4">
                        <h5>Payment Description: Clearance Fee</h5>
                        <p>Amount: NGN 3,000.00</p>
                        <p>Transaction Fee: NGN 500.00</p>
                        <p>Total: NGN 3,500.00</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('home') }}" class="btn btn-danger">Cancel Payment</a>
                                <a href="{{ route('clearances.edit', $clearance) }}" class="btn btn-primary">Pay Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
