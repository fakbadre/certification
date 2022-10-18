<?php
require 'Main.php';

class Disconnect extends Main{
    public function __construct(){
        new Main();
        Security::deconnexion();
        echo $this->getView('disconnect.twig', []);   
    }
}
new Disconnect();