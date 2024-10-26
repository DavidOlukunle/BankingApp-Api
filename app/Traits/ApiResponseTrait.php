<?php
namespace App\Traits;

trait ApiResponseTrait
{
   protected function success($data, $messsage = null, $code = 200)
   {
    return response()->json([
        'status' => 'request successfull',
        'message' => $messsage,
        'data' => $data
    ], $code);
   }

   protected function error($data, $message=null, $code)
   {
    return response()->json([
        'status' => 'error has occured',
        'message' => $message,
        'data'=> $data
    ],$code);
   }
}
