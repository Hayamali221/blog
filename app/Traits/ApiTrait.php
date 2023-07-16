<?php

namespace App\Traits;

Trait ApiTrait
{


    public function returnError($errNum, $msg)
    {
        return response()->json([
            'status' => false,
            'errNum' => $errNum,
            'msg' => $msg
        ]);
    }

    public function returnSuccessMessage($msg = "", $errNum = "200")
    {
        return [
            'status' => true,
            'statusNum' => $errNum,
            'msg' => $msg
        ];
    }

    public function returnData($key, $value, $msg = "")
    {
        return response()->json([
            'status' => true,
            'statusNum' => "200",
            'msg' => $msg,
            $key => $value
        ],200);
    }

    public function returnDataError($key, $value, $msg = "")
    {
        return response()->json([
            'status' => false,
            'statusNum' => "400",
            'msg' => $msg,
            $key => $value
        ],200);
    }

    public function returnValidationError($validator)
    {
        return $this->returnError('011', $validator->errors());
    }



}
