<?php
namespace App\Repositories\Web;

use App\Booking;
use App\Service;
use Illuminate\Http\Request;

class BookingRepository
{
    protected $booking;
    protected $service;
    public function __construct(Booking $booking = null, Service $service = null)
    {
        $this->booking = $booking ?? new Booking();
        $this->service = $service ?? new Service();
    }

    public function store(Request $request)
    {
        $booking = $this->booking->fill($request->toArray());
        $booking->save();
        $service = $this->service::find($request->service_id);
        return ['booking'=>$booking, 'service'=>$service];
    }
}