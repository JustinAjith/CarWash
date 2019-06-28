<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admin\ServiceRepository;
use App\Service;
use App\SubService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    protected $service;
    public function __construct(ServiceRepository $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $page = 'Services';
        $services = $this->service->index();
        return view('admin.services.index', compact('page', 'services'));
    }

    public function store(Request $request)
    {
        $this->service->store($request);
        return redirect()->back();
    }

    public function edit(Request $request, Service $service)
    {
        $service->update(['name'=>$request->name, 'amount'=>$request->amount]);
        return redirect()->back();
    }

    public function delete(Service $service)
    {
        $service->delete();
        return ['status'=>true];
    }

    public function storeSubService(Request $request)
    {
        $this->validate($request, [
            'service_id'=>'required',
            'name'=>'required|string'
        ]);
        $this->service->storeSubService($request);
        return ['status'=>true];
    }

    public function editSubService(Request $request)
    {
        $sub_service = SubService::find($request->service_id);
        $sub_service->update(['name'=>$request->name]);
        return ['status'=>true];
    }

    public function deleteSubService(SubService $sub_service)
    {
        $sub_service->delete();
        return ['status'=>true];
    }
}
