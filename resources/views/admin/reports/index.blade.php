@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Reports</div>
                <div class="card-body">
                   @foreach($reports as $report)
                       {{ $report->report }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
