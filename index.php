<?php

  include "autoload.php";

  $app = new Route();


// Home page
$app -> setRoute("/", function($req, $res){
  $res -> render("views", [
    'title' => 'Home',
    'contentDirectory' => "content",
    'contentFileName' => "home"
  ]);
});

?>
