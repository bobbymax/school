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

            <div class="card">
                <div class="card-header">
                    Complaint Page
                </div>
                <div class="card-body">
                    <form action="{{ route('complains.store') }}" method="POST">
                        @csrf
                       <div class="form-group mb-3">
                           <label for="student" class="mb-2">Name</label>
                           <input type="text" class="form-control" name="student" disabled value="{{ auth()->user()->firstname . " " . auth()->user()->surname }}">
                       </div>
                        <div class="form-group mb-3">
                            <label for="matric_no" class="mb-2">Matric No.</label>
                            <input type="text" class="form-control" name="matric_no" disabled value="{{ auth()->user()->matric_no }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="matric_no" class="mb-2">Department</label>
                            <input type="text" class="form-control" name="matric_no" disabled value="{{ auth()->user()->department->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="subject" class="mb-2">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="Enter Complaint Title">
                        </div>
                        <div class="form-group mb-5">
                            <label for="message" class="mb-2">Description</label>
                            <textarea type="text" class="form-control" name="message" placeholder="Explain Complaint Here"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit Complaint</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
