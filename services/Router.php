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
                // if(isset($_POST))
                // {
                //     $this->controller->createUser();
                // }
                // else
                // {
                //     $this->controller->render("views/users/create.phtml",[]);
                // }
                $this->controller->createUser();
            }
            else if ($route === "edit-user")
            {
                if(isset($_POST['submit-edit']))
                {
                    $this->controller->editUser($_POST['userId']);
                }
                else
                {
                    $this->controller->render("views/users/edit.phtml",$this->controller->getAllUsers());
                }
                // $this->controller->editUser($_POST['userId']);
            }
            else if ($route === "delete-user")
            {
                if(isset($_POST['submit-delete']))
                {
                    $this->controller->deleteUser($_POST['userId']);
                }
                else
                {
                    $this->controller->render("views/users/delete.phtml", $this->controller->getAllUsers());
                }
            }
            else if ($route === "read-user" && isset($_GET['user_id']))
            {
                $this->controller->readUser($_GET['user_id']);
            }
            else if ($route === "read-all-users")
            {
                $this->controller->render("views/users/index.phtml", $this->controller->getAllUsers());
            }
        }
        else
        {
            //HOME
        }
    }
}

?>