@extends('admin.layouts.master')
@section('content')
    <div class="row" ng-controller="bookingShowController">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">First name</b><br><span>{{ $booking->first_name }}</span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">Last Name</b><br><span>{{ $booking->last_name }}</span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">Email</b><br><span>{{ $booking->email ? $booking->email : '-' }}</span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">Phone</b><br><span>{{ $booking->phone }}</span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">Service</b><br><span>{{ $booking->service->name }}</span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">Amount</b><br><span>LKR {{ $booking->service->amount }}</span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">Vehicle</b><br><span>{{ $booking->vehicle }}</span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">Date</b><br><span>{{ $booking->date }}</span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">Time</b><br><span>{{ $booking->time }}</span>
                    </div>
                    <div class="col-md-3 mb-2">
                        <b class="text-muted">Status</b><br><span>{{ $booking->status }}</span>
                    </div>
                    <div class="col-md-6 mb-2">
                        <b class="text-muted">Message</b><br><span>{{ $booking->message ? $booking->message : '-' }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="float-right">
                            @if($booking->status == 'Pending')
                                <button type="button" class="btn btn-sm btn-success" ng-click="bookingStatus(status='accept')">Accept</button>
                                <button type="button" class="btn btn-sm btn-warning" ng-click="bookingStatus(status='reject')">Reject</button>
                            @endif
                            <button type="button" class="btn btn-sm btn-danger" ng-click="deleteBooking()">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.booking._inc.script')
@endsection