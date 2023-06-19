@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('clearances.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Clearance Payment Page
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-4">
                                <label for="payment_session" class="mb-2">Payment Session</label>

                                <select class="form-select" name="payment_session">
                                    <option selected>Select Payment Session</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>

                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="payment_level" class="mb-2">Payment Level</label>

                                <select class="form-select" name="payment_level">
                                    <option selected>Select Payment Level</option>
                                    <option value="400">Level 400</option>
                                    <option value="500">Level 500</option>
                                </select>

                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="payment_type" class="mb-2">Payment Type</label>
                                <input type="text" class="form-control" name="payment_type" id="payment_type" value="Clearance Portal Access Fee" readonly>
                            </div>
                            <div class="col-md-12 mb-5">
                                <label for="payment_method" class="mb-2">Payment Method</label>
                                <input type="text" class="form-control" name="payment_method" id="payment_type" value="E-Payment" readonly>
                            </div>
                            <div class="col-md-6">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="submit" class="btn btn-primary">Preview</button>
                                    <a href="{{ route('home') }}" class="btn btn-danger">Cancel Payment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
