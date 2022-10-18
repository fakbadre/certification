<?php
require "Main.php";
class Home extends Main{
    public function __construct(){
        new Main();
        
        echo $this->getView("home.twig", [
           
        ]);   
    }
}
new Home();