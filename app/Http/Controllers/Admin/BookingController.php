<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Repositories\Admin\BookingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    protected $booking;
    public function __construct(BookingRepository $booking)
    {
        $this->booking = $booking;
    }

    public function index(Request $request)
    {
        $page = 'Bookings';
        if(\request()->ajax()) {
            return $this->booking->index($request);
        }
        return view('admin.booking.index', compact('page'));
    }

    public function show($booking)
    {
        $page = 'Show Booking';
        $booking = $this->booking->show($booking);
        return view('admin.booking.show', compact('page', 'booking'));
    }

    public function status(Booking $booking, $status)
    {
        $booking->update(['status'=>ucfirst($status)]);
        return ['status'=>true];
    }

    public function delete(Booking $booking)
    {
        $booking->delete();
        return ['success'=>true];
    }
}
