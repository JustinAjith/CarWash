@extends('admin.layouts.master')
@section('style')
    <style>
        .serviceViewIcon {
            font-size: 22px;
            text-decoration: none !important;
            cursor: pointer;
            color: #333333;
        }
    </style>
@endsection
@section('content')
    <div class="row" ng-controller="serviceController">
        <div class="col-md-12">
            <div class="tile">
                @foreach($services as $service)
                    <div class="row">
                        <div class="col-md-6 card p-3">
                            <span>
                                {{ $service->name }}
                                <a class="fa fa-angle-double-down float-right serviceViewIcon ml-1" data-toggle="collapse" href="#collapse{{ $service->id }}" aria-expanded="false"></a>
                                <i class="fa fa-plus-circle float-right serviceViewIcon mr-1" aria-hidden="true" data-toggle="modal" data-target="#subServiceModel" ng-click="newSubService({{ $service }})"></i>
                            </span>
                        </div>
                        <div class="col-md-6 card p-3">
                            <div class="collapse" id="collapse{{ $service->id }}">
                                @foreach($service->sub_services as $sub_service)
                                    <div class="m-0 p-1">
                                        {{ $sub_service->name }}
                                        <i class="fa fa-trash-o float-right serviceViewIcon ml-1" aria-hidden="true" ng-click="deleteSupService({{ $sub_service->id }})"></i>
                                        <i class="fa fa-pencil-square-o float-right serviceViewIcon mr-1" aria-hidden="true" data-toggle="modal" data-target="#subServiceModel" ng-click="editSubService({{ $service }}, {{ $sub_service }})"></i>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="subServiceModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Sub Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="subServiceForm">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Service</label>
                                <input type="hidden" ng-model="service_id" ng-value="service_id" name="service_id">
                                <input type="text" class="form-control" ng-model="service" placeholder="enter service" readonly>
                                <small class="form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label>Sub Service</label>
                                <input type="text" class="form-control" placeholder="enter sub service" ng-model="name" ng-value="name" name="name">
                                <small class="form-text text-danger">@{{ subserviceError.name[0] }}</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-sm" ng-click="subServiceSubmit()" ng-show="newSubServiceShow">Submit</button>
                            <button type="submit" class="btn btn-primary btn-sm" ng-click="subServiceEdit()" ng-show="editSubServiceShow">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        app.controller('serviceController', function($scope, $http) {
            $scope.service_id = '';
            $scope.service = '';
            $scope.name = '';
            $scope.newSubServiceShow = false;
            $scope.editSubServiceShow = false;

            $scope.newSubService = function(service) {
                $scope.service_id = service.id;
                $scope.service = service.name;
                $scope.newSubServiceShow = true;
                $scope.editSubServiceShow = false;
            };

            $scope.editSubService = function(service, name) {
                $scope.service_id = name.id;
                $scope.service = service.name;
                $scope.name = name.name;
                $scope.newSubServiceShow = false;
                $scope.editSubServiceShow = true;
            };

            $scope.subserviceError = [];
            $scope.subServiceSubmit = function() {
                var routeUrl = "{{ route('admin.sub.services.store') }}";
                $http({
                    method: 'POST',
                    data: $('#subServiceForm').serialize(),
                    url: routeUrl,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(response){
                    swal("Success!", "Your action was successfully completed!", "success");
                    location.reload();
                },function(error){
                    $scope.subserviceError = error.data.errors;
                });
            };

            $scope.subServiceEdit = function() {
                var routeUrl = "{{ route('admin.sub.services.edit') }}";
                $http({
                    method: 'POST',
                    data: $('#subServiceForm').serialize(),
                    url: routeUrl,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function(response){
                    swal("Success!", "Your action was successfully completed!", "success");
                    location.reload();
                },function(error){
                    $scope.subserviceError = error.data.errors;
                });
            };


            $scope.deleteSupService = function(service) {
                var routeUrl = "{{ route('admin.sub.services.delete', ['sub_service'=>'ID']) }}";
                routeUrl = routeUrl.replace('ID', service);
                console.log(service);
                swal({
                    title: "Are you sure?",
                    text: "You want delete this service",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        $http({
                            method: 'DELETE',
                            url: routeUrl,
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        }).then(function(response){
                            swal("Deleted!", "Your imaginary file has been deleted.", "success");
                        });

                    } else {
                        swal("Cancelled", "Your imaginary file is safe :)", "error");
                    }
                });
            }
        });
    </script>
@endsection