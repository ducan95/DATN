<?php

namespace Extention;
class Api
{

    public function __construct()
    {
    }

    private static $body;
    public static function response($data = [])
    {	
        Api::$body = [
            'is_success' => true,
            'status_code' => 200,
            'data' => [],
            'errors' => []
        ] ;
        Api::$body = array_merge(Api::$body, $data);
        return response()->json(Api::$body);
    }

}
