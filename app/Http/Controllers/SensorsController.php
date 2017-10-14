<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

use App\Sensor;
use App\Device;
use Response;
use Exception;

class SensorsController extends Controller
{

  use JsonResponse;
  /**
   * [__construct description]
   */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['store']);
        $this->middleware([
            'device',
            'user.agent:idiot-device',
            'accept.json',
          ])->only(['store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'device_id' => 'required|string',
        'temperature' => 'required|numeric',
        'humidity' => 'required|numeric'
      ]);

      if ($validator->fails()) {
            return $this->responseBadRequest('Bad Request.', $validator->errors());
        }
        // dd($request->device_id);

        $device_id = $request->device_id;
        try {
          $device = Device::findOrFail($device_id);
        } catch (Exception $e) {
          return $this->responseBadRequest('Bad Request', 'NULL');
        }

        $sensor = new Sensor(array(
            'device_id' => $request->device_id,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity,
        ));

        $device->sensor()->save($sensor);
        return $this->responseCreated('devices',$sensor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
