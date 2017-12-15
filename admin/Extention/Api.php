<?php

namespace Extention;

class Api
{

    public function __construct()
    {
    }

    static function response($data = [], $status_code = 200, $errors = [], $is_success = true)
    {	
        return response()->json([
        	'is_success'  => $is_success,
        	'status_code' => $status_code,
        	'errors'      => $errors,
        	'data'        => $data,
        ]);
    }

}
