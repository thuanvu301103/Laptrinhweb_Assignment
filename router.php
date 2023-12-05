<?php

class Router {

private $routes;

public function addRoute($pattern, $function) {
    $this->routes['{'.$pattern.'}'] = $function;
}

public function run() {
    foreach( $this->routes as $pattern => $function) {
        if( preg_match($pattern, $_SERVER['REQUEST_URI'], $params) ) {
            array_shift($params);
            array_unshift($params, $_SERVER['REQUEST_URI']);
            return call_user_func_array($function, array_values($params));
        }
    }
    return false;
}

}

?>