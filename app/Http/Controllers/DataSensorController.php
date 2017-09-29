<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\DataSensor;
use Response;
use Illuminate\Support\Str;

class DataSensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataSensor = DataSensor::all();
        // $response = Response::json($dataSensor,200);
        return $dataSensor;
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
        if ((!$request->deviceID) || (!$request->Temperature) || (!$request->Humidity)) {
          $response = Response::json([
            'error' => [
              'message' => 'Please enter required fields.'
            ]
          ], 422);
          return response;
        }

        $datasensor = new DataSensor(array(
          'deviceID' => $request->deviceID,
          'Temperature' => $request->Temperatur,
          'Humdity' => $request->Humidity
        ));

        $datasensor->save();

        $response = Response::json([
          'message' => 'Data has uploaded succesfully.',
          'data' => $datasensor
        ], 201);

        return response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datasensor = DataSensor::find($id);

        if (!$datasensor) {
          $response = Response::json([
            'error' =>  [
              'message' => 'Not found.'
            ]
          ], 400);
          return $response;
        }

        $response = Response::json([
          $datasensor, 200
        ]);
        return $response;
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
