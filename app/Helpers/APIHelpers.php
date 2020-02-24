<?php

namespace App\Helpers;

class APIHelpers{

    public static function createAPIResponse($is_error, $code, $message, $content){
        $result =[];

        if($is_error){
            $result['success'] = false;
            $result['code'] = $code;
            $result['message'] = $message;
        }else{
            $result['success'] = true;
            $result['code'] = $code;
            $result['message'] = $message;
            $result['content'] = $content;
        }
        return $result;
    }
}
