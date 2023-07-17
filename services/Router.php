<?php

class Router 
{
    private ?string $route;
    
    public function __construct()
    {
        $this->route = $_GET['route'];
    }
    
    public function checkRoute($route) : void
    {
        if (isset($route))
        {
            if($route === "create-user")
            {
                //CREATE
            }
            else if ($route === "edit-user")
            {
                //EDIT
            }
            else if ($route === "delete-user")
            {
                //DELETE
            }
            else if ($route === "read-user")
            {
                //READ
            }
            else if ($route === "read-all-users")
            {
                //ALL
            }
        }
        else
        {
            //HOME
        }
    }
}

?>