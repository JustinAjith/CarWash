<?php
namespace App\Repositories\Admin;

use App\Service;
use App\SubService;
use Illuminate\Http\Request;

class ServiceRepository
{
    protected $service;
    protected $subService;
    public function __construct(Service $service = null, SubService $subService = null)
    {
        $this->service = $service ?? new Service();
        $this->subService = $subService ?? new SubService();
    }

    public function index()
    {
        return $this->service::with('sub_services')->get();
    }

    public function store(Request $request)
    {
        $service = $this->service->fill($request->toArray());
        $service->save();
        return ['success'=>true];
    }

    public function storeSubService(Request $request)
    {
        $service = $this->subService->fill($request->toArray());
        $service->save();
        return ['success'=>true];
    }
}