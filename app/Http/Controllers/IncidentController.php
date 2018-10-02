<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Incident;
use App\Http\Resources\IncidentResource;

class IncidentController extends Controller
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
        return IncidentResource::collection(Incident::all());
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

        $incident = new Incident;
        $incident->title = $request->title;
        $incident->save();
        $incident->logs()->save($log);

        return new IncidentResource($incident);
    }

    /**
     * Display the specified resource.
     *
     * @param  Incident $incident
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        return new IncidentResource($incident);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Incident $incident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incident $incident)
    {
        $log = new Log;
        $log->owner = $request->owner;
        $log->device_id = $request->device_id;
        $log->description = $request->description;
        $log->resolved = $request->resolved;

        $incident->title = $request->title;
        $incident->update();
        $incident->logs()->update($log->toArray());
        
       return new IncidentResource($incident);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Incident $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();
        $incident->logs()->delete();
        return new IncidentResource($incident);
    }
}
