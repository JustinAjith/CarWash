@extends('web.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/web/datatables.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="jobListTable">
                            <thead>
                            <tr>
                                <th>Vehicle</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/datatables.js') }}"></script>
    <script>
        var routeUrl = "{{ route('web.schedule.table') }}";
        $('#jobListTable').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": routeUrl,
                "dataType": "json",
                "type": "POST",
                "data": {_token: "{{csrf_token()}}"}
            },
            "columns": [
                {"data": "vehicle"},
                {"data": "service"},
                {"data": "date"},
                {"data": "time"}
            ]
        } );
    </script>
@endsection
