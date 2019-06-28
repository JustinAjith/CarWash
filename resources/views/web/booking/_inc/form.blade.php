<div class="row vehiclesRow">
    <div class="col-12"><h5 class="mt-3 mb-0 formHeading">Vehicle type</h5></div>
    <div class="form-group">
        <div class="searchable-container">
            <div class="items col-sm-6 col-md-3">
                <div class="info-block block-info clearfix">
                    <div data-toggle="buttons" class="btn-group bizmoduleselect">
                        <label class="btn btn-default radioBackGround">
                            <div class="bizcontent">
                                <input type="radio" class="hiddenInput vehicleSelect" name="vehicle" autocomplete="off" value="Car">
                                <img src="{{ asset('images/vehicle/car.png') }}" class="vehicleImage">
                                <h5>Regular Size Car</h5>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="items col-sm-6 col-md-3">
                <div class="info-block block-info clearfix">
                    <div data-toggle="buttons" class="btn-group bizmoduleselect">
                        <label class="btn btn-default radioBackGround">
                            <div class="bizcontent">
                                <input type="radio" class="hiddenInput vehicleSelect" name="vehicle" autocomplete="off" value="Mid Size Bus">
                                <img src="{{ asset('images/vehicle/small_bus.png') }}" class="vehicleImage">
                                <h5>Mid Size Bus</h5>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="items col-sm-6 col-md-3">
                <div class="info-block block-info clearfix">
                    <div data-toggle="buttons" class="btn-group bizmoduleselect">
                        <label class="btn btn-default radioBackGround">
                            <div class="bizcontent">
                                <input type="radio" class="hiddenInput vehicleSelect" name="vehicle" autocomplete="off" value="Regular Size Bus">
                                <img src="{{ asset('images/vehicle/big_bus.png') }}" class="vehicleImage">
                                <h5>Regular Size Bus</h5>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="items col-sm-6 col-md-3">
                <div class="info-block block-info clearfix">
                    <div data-toggle="buttons" class="btn-group bizmoduleselect">
                        <label class="btn btn-default radioBackGround">
                            <div class="bizcontent">
                                <input type="radio" class="hiddenInput vehicleSelect" name="vehicle" autocomplete="off" value="Truck">
                                <img src="{{ asset('images/vehicle/truck.png') }}" class="vehicleImage">
                                <h5>Truck</h5>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <small class="text-danger">@{{ error.vehicle[0] }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12"><h5 class="mt-3 mb-0 formHeading">Services menu</h5></div>
    <div class="form-group mt-4">
        <div class="row">
            @foreach($services as $service)
            <div class="col-md-3">
                <div class="block">
                    <div class="top text-center">
                        <span class="converse">{{ $service->name }}</span>
                    </div>
                    <div class="bottom mt-1">
                        <div class="justify-content-center">
                            <ul class="list-unstyled subServicesList">
                                @foreach($service->sub_services as $sub_service)
                                    <li class="text-muted">{{ $sub_service->name }}</li>
                                @endforeach
                            </ul>
                            <label class="btn btn-sm btn-info servicesSelectButton">
                                <input type="radio" autocomplete="off" name="service_id" value="{{ $service->id }}">
                                <span class="glyphicon glyphicon-ok">Select</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-12">
                    <small class="text-danger">@{{ error.service_id[0] }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12"><h5 class="mt-3 mb-3 formHeading">Select date and time</h5></div>
    <div class="col-md-6 mb-3">
        <label>Date</label>
        <input type="text" class="form-control appDate" name="date" readonly>
        <small class="text-danger">@{{ error.date[0] }}</small>
    </div>
    <div class="col-md-6 mb-3">
        <label>Time</label>
        <input type="text" class="form-control timepicker" name="time" readonly>
        <small class="text-danger">@{{ error.time[0] }}</small>
    </div>
</div>




<div class="row">
    <div class="col-12"><h5 class="mt-3 mb-3 formHeading">Personal details</h5></div>
    <div class="col-md-6 mb-3">
        <label>First Name</label>
        <input type="text" class="form-control" name="first_name" placeholder="enter first name">
        <small class="text-danger">@{{ error.first_name[0] }}</small>
    </div>
    <div class="col-md-6 mb-3">
        <label>Last Name</label>
        <input type="text" class="form-control" name="last_name" placeholder="enter last name">
        <small class="text-danger">@{{ error.last_name[0] }}</small>
    </div>
    <div class="col-md-6 mb-3">
        <label>Email</label> <span class="text-muted">(Optional)</span>
        <input type="email" class="form-control" name="email" placeholder="enter email address">
    </div>
    <div class="col-md-6 mb-3">
        <label>Phone</label>
        <input type="text" class="form-control" name="phone" placeholder="enter phone number">
        <small class="text-danger">@{{ error.phone[0] }}</small>
    </div>
    <div class="col-md-12 mb-3">
        <label>Message</label>
        <textarea class="form-control" rows="4" name="message" placeholder="enter message"></textarea>
    </div>
</div>
