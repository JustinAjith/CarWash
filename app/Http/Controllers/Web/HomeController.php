<?php

namespace App\Http\Controllers\Web;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.home.index');
    }

    public function schedule()
    {
        return view('web.schedule.index');
    }

    public function scheduleTable(Request $request)
    {
        $columns = array(
            0 => 'vehicle',
            1 => 'service',
            2 => 'date',
            3 => 'time',
        );
        $totalDatas = Booking::where('status', 'Accept')->count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))) {
            $posts = DB::table('bookings')->join('services', 'services.id', '=', 'bookings.service_id')
                ->where('status', 'Accept')
                ->select('services.name', 'bookings.*')->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = $totalDatas;
        } else {
            $search = $request->input('search.value');
            $filteredData = DB::table('bookings')->select('services.name', 'bookings.*')->join('services', 'services.id', '=', 'bookings.service_id')->where('status', 'Accept')
                ->where(function($q) use ($search) {
                    $q->where('vehicle', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('date', 'like', "%{$search}%")
                        ->orWhere('time', 'like', "%{$search}%");
                });

            $posts = $filteredData->offset($start)->limit($limit)->orderBy($order, $dir)->get();
            $totalFiltered = $filteredData->count();
            dd($posts);
        }

        $data = array();

        if($posts){
            foreach($posts as $r) {
                $nestedData['vehicle'] = $r->vehicle;
                $nestedData['service'] = $r->name;
                $nestedData['date'] = $r->date;
                $nestedData['time'] = $r->time;
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
}
