<div class="navMenuBar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="float-left navMenuBarLogo">
                    <a href="{{ route('web.home') }}">
                        <img src="{{ asset('images/logo/logo.png') }}" class="appLogo">
                    </a>
                </div>
                <div class="float-right navMenuBarMenuItems">
                    <ul class="list-unstyled list-inline m-0">
                        <li class="list-inline-item"><a href="{{ route('web.home') }}">Home</a></li>
                        <li class="list-inline-item"><a href="{{ route('web.booking') }}">Booking</a></li>
                        <li class="list-inline-item"><a href="{{ route('web.schedule') }}">Time schedule</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>