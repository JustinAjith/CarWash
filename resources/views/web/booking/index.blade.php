@extends('web.layouts.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/lib/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/timepicker.css') }}">
    <style>
        .block {
            min-height: 430px;
            background: #fff;
            padding: 12px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            border: 1px solid #efefef;
            box-shadow: 1px 0px 8px 0 #ccc;
            /*box-shadow: 0 2px 55px rgba(0,0,0,0.1);*/
        }
        .top {
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 10px;
        }
        .converse {
            padding: 2px 10px;
            border-radius: 20px;
            text-transform: uppercase;
            font-size: 18px;
        }
        .bottom {
            text-align: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }
        .bottom .subServicesList {
            font-size: 15px;
        }
        .servicesSelectButton {
            position: absolute;
            bottom: 20px;
            left: 100px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div ng-controller="webHomeController" ng-cloak>
            <form ng-submit="submitBooging()" id="bookingForm">
                @include('web.booking._inc.form')
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-sm btn-primary mb-2">Submit</button>
                    </div>
                </div>
            </form>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-4">
                                    <h5>Vehicle</h5>
                                    <small class="text-muted">@{{ booking.vehicle }}</small>
                                </div>
                                <div class="col-4">
                                    <h5>Service</h5>
                                    <small class="text-muted">@{{ service.name }}</small>
                                </div>
                                <div class="col-4">
                                    <h5>Date</h5>
                                    <small class="text-muted">@{{ booking.date }}</small>
                                </div>
                                <div class="col-4">
                                    <h5>Time</h5>
                                    <small class="text-muted">@{{ booking.time }}</small>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <h5>First Name</h5>
                                    <small class="text-muted">@{{ booking.first_name }}</small>
                                </div>
                                <div class="col-4">
                                    <h5>Last Name</h5>
                                    <small class="text-muted">@{{ booking.last_name }}</small>
                                </div>
                                <div class="col-4">
                                    <h5>Email</h5>
                                    <small class="text-muted">@{{ booking.email }}</small>
                                </div>
                                <div class="col-4">
                                    <h5>Phone</h5>
                                    <small class="text-muted">@{{ booking.phone }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('js/lib/datepicker.js') }}"></script>
<script src="{{ asset('js/lib/timepicker.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('#search').on('keyup', function() {
            var pattern = $(this).val();
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function() {
                return $(this).text().match(new RegExp(pattern, 'i'));
            }).show();
        });

        $('#exampleModal').on('hidden.bs.modal', function () {
            location.reload();
        })
    });
</script>
<script>
    $('.appDate').datepicker({
        format: 'yyyy-mm-dd'
    });
    $(document).ready(function () {
        $('.timepicker').wickedpicker();
    });
</script>
<script>
    app.controller('webHomeController', function($scope, $http){
        $scope.booking = null;
        $scope.service = null;
        $scope.error = [];
        $scope.submitBooging = function() {
            $http({
                method: "POST",
                url: "{{ route('booking.store') }}",
                data: $('#bookingForm').serialize(),
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function(response) {
                $('#exampleModal').modal('show');
                $scope.booking = response.data.booking;
                $scope.service = response.data.service;
            },function(error){
                $scope.error = error.data.errors;;
            });
        };
    });
</script>
@endsection
