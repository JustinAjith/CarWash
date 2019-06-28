<script>
    app.controller('bookingShowController', function($scope, $http){
            $scope.deleteBooking = function() {
            var routeUrl = "{{ route('admin.booking.delete', $booking->id) }}";
            swal({
                title: "Are you sure?",
                text: "You want delete this booking",
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
                        window.location.href = "{{ route('admin.booking')}}";
                    });

                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        };

        $scope.bookingStatus = function(status){
            var status = status;
            var routeUrl = "{{ route('admin.booking.change.status', ['booking'=>$booking->id, 'status'=>'STATUS']) }}";
            routeUrl = routeUrl.replace('STATUS', status);
            swal({
                title: "Are you sure?",
                text: "You want change status to "+status,
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, change it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm) {
                if (isConfirm) {
                    $http({
                        method: 'POST',
                        url: routeUrl,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    }).then(function(response){
                        swal("Changed!", "Your imaginary file has been deleted.", "success");
                        location.reload();
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        };

    });
</script>