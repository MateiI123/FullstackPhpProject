<?php



class ErrorController{



public static function notFound($message = "Resource not found"){

    http_response_code(404);

    loadView('error' , [
        'status' => '404',
        'message' => $message
    ]);
    
}

public static function unauthorized($message = "Not Authorized"){

    http_response_code(403);

    loadView('error' , [
        'status' => '40',
        'message' => $message
    ]);
    
}







}









?>