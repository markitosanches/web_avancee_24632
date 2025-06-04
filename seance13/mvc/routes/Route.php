<?php
namespace App\Routes;

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
        $urlSegments = explode('?', $url);
        $urlPath = rtrim($urlSegments[0],'/');
        //  print_r($urlSegments);
        //  die();

        foreach(self::$routes as $route){
            // echo BASE.$route['url']." = ".$url."<br/>";
            if(BASE.$route['url'] == $urlPath && $route['method'] == $method){
                $controllerSegments = explode('@', $route['controller']);
                // print_r($contollerSegments);
                // die();
                $controllerName = 'App\\Controllers\\'.$controllerSegments[0];
                $methodName = $controllerSegments[1];
                $controllerInstance = new $controllerName;
                // echo $urlSegments[0];
                // die();
                if($method == 'GET'){
                    if(isset($urlSegments[1])){
                         parse_str($urlSegments[1], $queryParams);
                        //  print_r($queryParams);
                        //  die();
                        $controllerInstance->$methodName($queryParams);
                    }else{
                        $controllerInstance->$methodName();
                    }
                }
                
             return;
            }
        }
        http_response_code(404);
        echo "404 page not found";
    }
}

