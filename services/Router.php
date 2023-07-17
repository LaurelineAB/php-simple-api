<?php

class Router 
{
    private ?string $route;
    private UserController $controller;
    
    public function __construct($controller)
    {
        $this->route = $_GET['route'];
        $this->controller = $controller;
    }
    
    public function checkRoute($route) : void
    {
        if (isset($route))
        {
            if($route === "create-user")
            {
                $this->controller->createUser();
            }
            else if ($route === "edit-user")
            {
                if(isset($_POST))
                {
                    $this->controller->editUser($_POST['id']);
                }
                else
                {
                    $this->controller->render("views/users/edit.phtml",[]);
                }
            }
            else if ($route === "delete-user")
            {
                if(isset($_POST))
                {
                    $this->controller->deleteUser($_POST['id']);
                }
                else
                {
                    $this->controller->render("views/users/delete.phtml",[]);
                }
            }
            else if ($route === "read-user" && isset($_GET['user_id']))
            {
                $this->controller->readUser($_GET['user_id']);
            }
            else if ($route === "read-all-users")
            {
                $this->controller->getAllUsers();
            }
        }
        else
        {
            //HOME
        }
    }
}

?>