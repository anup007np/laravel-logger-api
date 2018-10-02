<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Http\Resources\LogResource;
use App\Http\Requests\LogStoreRequest;

class LogController extends Controller
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
        return LogResource::collection(Log::all());
    }

    /**
     * Display the specified resource.
     *
     * @param Log $log 
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        return new LogResource($log);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Log $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        $log->delete();
        return new LogResource($log);
    }
}
