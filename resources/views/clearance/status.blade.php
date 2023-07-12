@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
{{--                        {{$type}}--}}
                        @php
                            $header = match ($type) {
                                'result' => ['title' => 'Print Result', 'sub' => ''],
                                'hostel' => ['title' => 'Hostel Clearance', 'sub' => 'Hostel Dues Payment History'],
                                'clinic' => ['title' => 'Clinic Clearance', 'sub' => 'Medical Bills'],
                                'college' => ['title' => 'College Clearance', 'sub' => 'College Dues']
                            };
                        @endphp
                        {{$header['title']}}
                    </div>
                    <div class="card-body">
                        <h3>{{ $header['sub'] }}</h3>

                        <table class="table table-bordered table-striped table-responsive table-hover">
                            <tbody>
                                @foreach($levels as $level)
                                    <tr>
                                        <td>{{ $level->key }}</td>
                                        <td>
                                            <button type="button" disabled class="btn btn-primary">{{ $status }}</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
