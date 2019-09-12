<?php

  class Route{

    public function setRoute($route, $callback){
      $request_uri = $_SERVER['REQUEST_URI'];

      $a = Request :: params_array($route);
      $b = Request :: params_array($request_uri);
      if(sizeof($a)==sizeof($b)){
        $request = new Request($route, $request_uri);

        if($request -> params_match()){
          $route = $request_uri;
        }

        $response = new Response();

        if($request_uri==$route){
          return $callback($request, $response);
        }
      }
    }
  }

?>
