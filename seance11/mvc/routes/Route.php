<?php

class Route {
    private static $routes = [];

    public static function get($url, $controller){
        self::$routes[] = ['url' => $url, 'controller' => $controller, 'method' => 'GET'];
    }

     public static function post($url, $controller){
        self::$routes[] = ['url' => $url, 'controller' => $controller, 'method' => 'POST'];
    }

    public static function dispatch(){
        //print_r(self::$routes);
        // print_r($_SERVER);
        $url = $_SERVER['REQUEST_URI'];
        // echo $url;
        $method = $_SERVER['REQUEST_METHOD'];

        foreach(self::$routes as $route){
            // echo BASE.$route['url']." = ".$url."<br/>";
            if(BASE.$route['url'] == $url && $route['method'] == $method){
                $contollerSegments = explode('@', $route['controller']);
                //print_r($contollerSegments);
                $controllerName = $contollerSegments[0];
                $methodName = $contollerSegments[1];
                $controllerInstance = new $controllerName;
                
                if($method == 'GET'){
                    $controllerInstance->$methodName();
                }
                
             return;
            }
        }
        http_response_code(404);
        echo "404 page not found";
    }
}

