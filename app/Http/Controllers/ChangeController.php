<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Change;
use App\Http\Resources\ChangeResource;

class ChangeController extends Controller
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
        return ChangeResource::collection(Change::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $log = new Log;
        $log->owner = $request->owner;
        $log->device_id = $request->device_id;
        $log->resolved = $request->resolved;
        $log->description = $request->description;

        $change = new Change;
        $change->title = $request->title;
        $change->save();
        $change->logs()->save($log);

        return new ChangeResource($change);
    }

    /**
     * Display the specified resource.
     *
     * @param  Change $change
     * @return \Illuminate\Http\Response
     */
    public function show(Change $change)
    {
        return new ChangeResource($change);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Change $change
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Change $change)
    {
        $log = new Log;
        $log->owner = $request->owner;
        $log->device_id = $request->device_id;
        $log->description = $request->description;
        $log->resolved = $request->resolved;

        $change->title = $request->title;
        $change->update();
        $change->logs()->update($log->toArray());
        
       return new ChangeResource($change);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Change $change
     * @return \Illuminate\Http\Response
     */
    public function destroy(Change $change)
    {
        $change->delete();
        $change->logs()->delete();
        return new ChangeResource($change);
    }
}
