<?php
namespace App\Repositories\Admin;

use App\Booking;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingRepository
{
    protected $booking;
    protected $service;
    public function __construct(Booking $booking = null, Service $service = null)
    {
        $this->booking = $booking ?? new Booking();
        $this->service = $service ?? new Service();
    }

    public function index(Request $request)
    {
        $columns = array(
            0 => 'vehicle',
            1 => 'service',
            2 => 'date',
            3 => 'time',
            3 => 'status',
        );
        $totalDatas = $this->booking->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))) {
            $posts = DB::table('bookings')->join('services', 'services.id', '=', 'bookings.service_id')
                ->select('services.name', 'bookings.*')->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = $totalDatas;
        } else {
            $search = $request->input('search.value');

            $filteredData = DB::table('bookings')->select('services.name', 'bookings.*')->join('services', 'services.id', '=', 'bookings.service_id')
                ->where(function($q) use ($search) {
                $q->where('vehicle', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%")
                    ->orWhere('date', 'like', "%{$search}%")
                    ->orWhere('time', 'like', "%{$search}%");
            });

            $posts = $filteredData->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $filteredData->count();
        }

        $data = array();

        if($posts){
            foreach($posts as $r) {
                $nestedData['vehicle'] = $r->vehicle;
                $nestedData['service'] = $r->name;
                $nestedData['date'] = $r->date;
                $nestedData['time'] = $r->time;
                $nestedData['status'] = $r->status == "Accept" ? "<span class=\"badge badge-success\">Accept</span>" : ($r->status == "Pending" ? "<span class=\"badge badge-secondary\">Pending</span>" : ($r->status == "Reject" ? "<span class=\"badge badge-danger\">Reject</span>" : ""));
                $nestedData['action'] = '<a href="booking/'.$r->id.'" class="btn btn-sm btn-dark">View</a>';
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalDatas),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }

    public function show($booking)
    {
        return $this->booking::with('service')->find($booking);
    }
}