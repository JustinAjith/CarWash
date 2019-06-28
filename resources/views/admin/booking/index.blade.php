@extends('admin.layouts.master')
@section('content')
    <div class="row">
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>
    <script>
        var routeUrl = "{{ route('admin.booking.table') }}";
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
                {"data": "time"},
                {"data": "status"},
                {"data": "action"}
            ]
        } );
    </script>
@endsection