<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Http\Resources\DeviceResource;
use App\Http\Requests\DeviceStoreRequest;

class DeviceController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DeviceResource::collection(Device::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceStoreRequest $request)
    {
        $validated = $request->validated();

        $device = Device::create([
            'type' => $request->type
        ]);
    
        return new DeviceResource($device);
    }

    /**
     * Display the specified resource.
     *
     * @param  Device $device 
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        return new DeviceResource($device);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Device $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        $device->update($request->all());
        return new DeviceResource($device);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Device $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        $device->delete();
        return new DeviceResource($device);
    }
}
