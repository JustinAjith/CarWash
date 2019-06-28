@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="float-left tile-title">Recent Booking</h3>
                <a class="float-right" href="{{ route('admin.booking') }}">View All</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Vehicle</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->vehicle }}</td>
                            <td>{{ $service->service->name }}</td>
                            <td>{{ $service->date }}</td>
                            <td>{{ $service->time }}</td>
                            <td>{{ $service->status }}</td>
                            <td><a href="{{ route('admin.booking.show', $service->id) }}" class="btn btn-sm btn-dark">View</a></td>
                        </tr>
                    @endforeach
                    @if(!$services)
                        <tr>
                            <td colspan="6" class="bg-secondary">No data to show</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection