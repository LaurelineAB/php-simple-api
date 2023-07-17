<?php

if(isset($_GET["route"]))
{
    $route = $_GET["route"]; // récupérer la route dans les paramètres de l'URL
    
    require "router.php";
}



