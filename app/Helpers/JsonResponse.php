<?php

namespace App\Helpers;

/**
 *
 */
trait JsonResponse
{
  public function responseOk($data)
  {
    return response()->json([
      'code' => 200,
      'status' => 'success',
      'data' => $data
    ], 200);
  }

  public function responseCreated($location, $data = null)
  {
    return response()->json([
      'code' => 201,
      'status' => 'success',
      'data' => $data
    ], 201);
  }

  public function responseNoContent()
  {
    return response('', 204);
  }

  public function responseNotModified($value='')
  {
    return response('', 304);
  }

  public function responseBadRequest($message, $data)
  {
    return response()->json([
      'code' => 400,
      'status' => 'error',
      'message' => $message,
      'data' => $data
    ], 400);
  }

  public function responseUnauthorized($message, $data)
  {
    return response()->json([
      'code' => 401,
      'status' => 'error',
      'message' => $message,
      'data' => $data
    ], 401);
  }

  public function responseForbidden($message, $data)
  {
    return response()->json([
      'code' => 403,
      'status' => 'error',
      'message' => $message,
      'data' => $data
    ], 403);
  }

  public function responseNotFound($message, $data)
  {
    return response()->json([
      'code' => 404,
      'status' => 'error',
      'message' => $message,
      'data' => $data
    ], 404);
  }

  public function responseMethodNotAllowed($message, $data)
  {
    return response()->json([
      'code' => 405,
      'status' => 'error',
      'message' => $message,
      'data' => $data
    ], 405);
  }

  public function responseConflict($message, $data)
  {
    return response()->json([
      'code' => 409,
      'status' => 'error',
      'message' => $message,
      'data' => $data
    ], 409);
  }

  public function responseInternalServerError($message, $data)
  {
    return response()->json([
      'code' => 500,
      'status' => 'error',
      'message' => $message,
      'data' => $data
    ], 500);
  }
}
