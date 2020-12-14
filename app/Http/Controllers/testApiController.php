<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
class testApiController extends Controller
{
    //
    public function sendResponse($resut, $mess)
    {
        $respone = [
            'success' => true,
            'data' => $resut,
            'message' => $mess
        ];
        return response()->json($respone, 200);
    }
    public function sendError($error, $errorMessage = [], $code = 404)
    {
        $error = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessage)) {
            $error['data'] = $errorMessage;
        }
        return response()->json($error, $code);
    }
}
