<?php

namespace App\Http\Controllers\Web;

use App\Booking;
use App\Http\Requests\BookingRequest;
use App\Repositories\Web\BookingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    protected $booking;
    public function __construct(BookingRepository $booking)
    {
        $this->booking = $booking;
    }

    public function index() {
        return view('web.booking.index');
    }

    public function store(BookingRequest $request)
    {
        $booking = $this->booking->store($request);
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to' => '94775932985',
            'from' => '94775932985',
            'text' => 'You are getting new booking.'
        ]);
        return response()->json($booking);
    }
}
