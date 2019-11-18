<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($message, $code = 200)
    {
        $response = [
            'success' => true,
            'code' => $code,
            'message' => $message,
//            'data'    => $result,
        ];
        return response()->json($response, 200);


    }
    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages, $code = 404)
    {
        $response = [
            'success' => false,
            'code' => $code,
            'message' => $error,
//            'data' => array(),
        ];
//
//        if(!empty($errorMessages)){
//            $response['data'] = $errorMessages;
//        }else{
//            $response['data'] = array();
//        }
        return response()->json($response, $code);
    }
}