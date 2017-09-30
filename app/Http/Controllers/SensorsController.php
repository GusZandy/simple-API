<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sensor;
use Response;

class SensorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensor = Sensor::all();
        $lastest = $sensor->find($sensor->count());
        $response = Response::json([
          $lastest, 200
        ]);

        return $response;
        // return $sensor->count();
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
        if ((!$request->deviceID) || (!$request->temperature) || (!$request->humidity)) {
          $response = Response::json([
            'error' => [
              'message' => 'Please fill all fields.'
            ]
          ], 422);
          return $response;
        }

        $sensor = new Sensor(array(
            'deviceID' => $request->deviceID,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity,
        ));

        $sensor->save();

        $response = Response::json([
          'message' => 'Data has received succesfully.',
          'data' => $sensor,
        ], 201);

        return $response;
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
