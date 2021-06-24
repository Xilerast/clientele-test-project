<?php

class Request
{
    // Removes slashes from the start and the end of the URI, as well as the GET method parameters
    public static function uri()
    {
        $uri = trim($_SERVER['REQUEST_URI'], '/');
        $getReqUri = strtok($uri, '?');
        if ($getReqUri) {
            return $getReqUri;
        } else {
            return $uri;
        }
    }
}

?>