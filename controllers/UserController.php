<?php

class UserController
{
    private UserManager $manager;
    
    public function __construct($manager)
    {
        $this->manager = $manager;
    }
    
    public function getManager() : UserManager
    {
        return $this->manager;
    }
    public function setManager(UserManager $manager) : void
    {
        $this->manager = $manager;
    }
    
    //RENDER
    public function render(string $view, array $values) : void
    {
        $template = $view;
        $data = $values;
        require './views/layout.phtml';
    }
    
    //READ ALL USERS
    public function getAllUsers() : array
    {
        $users = $this->manager->getAllUsers();
        return $users;
    }
    
    //READ USER
    public function readUser($id) : User
    {
        $user = $this->manager->getUserById($id);
        $this->render("views/users/user.phtml", [$user]);
        return $user;
    }
    
    //NEW USER
    public function createUser() : void
    {
        if(isset($_POST['submit-create']))
        {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $user = new User($firstName, $lastName, $email);
            $this->manager->createUser($user);
            $this->render("views/users/index.phtml", $this->getAllUsers());
        }
        else
        {
            $this->render("views/users/create.phtml", []);
        }
    }
    
    //EDIT USER
    public function editUser($id) : void
    {
        if(isset($_POST['submit-edit']))
        {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $user = new User($firstName, $lastName, $email);
            $user->setId($id);
            $this->manager->editUser($user);
            $this->render("views/users/index.phtml", $this->getAllUsers());
        }
        else
        {
            $this->render("views/users/edit.phtml", $this->getAllUsers());
        }
    }
    
    //DELETE USER
    public function deleteUser($id) : void
    {
        $this->manager->deleteUser($id);
        $this->render("views/users/index.phtml", $this->getAllUsers());
    }
}

?>