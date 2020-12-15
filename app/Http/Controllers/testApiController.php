<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;

class testApiController extends Controller
{
    //
    public function sendResponse($resut, $mess)
    {
        $respone = [
            'success' => true,
            'data' => $resut,
            'message' => $mess,
        ];
        return response()->json($respone, 200);
    }
    public function sendError($error, $errorMessage = [], $code = 404)
    {
        $respone = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessage)) {
            $respone['data'] = $errorMessage;
        }
        return response()->json($respone, $code);
    }
}
