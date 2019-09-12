<?php
class Request{
  public $route;
  public $uri;

  public function __construct($route, $uri){
    $this -> route = $route;
    $this -> uri = $uri;
  }

  public function params(string $id){
    $raw_route = self :: split_params($this -> route);
    $raw_request = self :: split_params($this -> uri);
    $params = self :: combine($raw_route, $raw_request);
    return $params[$id];
  }

  public function params_match(){
    $a = self :: split_params($this -> route);
    $b = self :: split_params($this -> uri);
    $matches = array_intersect($a, $b);
    return $matches;
  }

  public static function split_params($str){
    $str = str_replace(":", "", $str);
    $arr = explode("/", $str);
    array_shift($arr);
    return $arr;
  }

  public static function combine($arr1, $arr2){
    $arr_comb = "";
    if(sizeof($arr1)==sizeof($arr2)){
     $arr_comb = array_combine($arr1, $arr2);
    }
    return $arr_comb;
  }

  public static function params_array($str){
    $arr = explode("/", $str);
    return $arr;
  }

  public static function params_id($str){
    $arr = explode("/", $str);
    $id = array_pop($arr);
    return $id;
  }

  public function get_uri(){
    $request_uri = $_SERVER['REQUEST_URI'];
    return $request_uri;
  }

  public function get_uri_to_array(){
    $a = $_SERVER['REQUEST_URI'];
    $a = explode("/", $a);
    return $a;
  }

  public static function get_request(){
    return var_dump($_GET);
  }

  public function post_request(){
    return var_dump($_POST);
  }

  // Teste para uma função do tipo getBody ...
  public function get_body(){
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    return print_r($data);
  }
}
?>
