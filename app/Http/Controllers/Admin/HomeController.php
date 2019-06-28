<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $page = 'Dashboard';
        $services = Booking::with('service')->orderBy('id', 'DESC')->take(5)->get();
        return view('admin.dashboard.index', compact('page', 'services'));
    }
}
