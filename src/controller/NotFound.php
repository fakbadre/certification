<?php
require "Main.php";

class NotFound extends Main{
    public function __construct(){
        new Main();
        echo $this->getView("404.twig", []);   
    }
}
new NotFound();