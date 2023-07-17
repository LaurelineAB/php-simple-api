<?php

class UserManager
{
    private PDO $db;
    private string $dbName;
    private string $port;
    private string $host;
    private string $username;
    private string $password;
    
    public function __construct(string $dbName, string $port, string $host, string $username, string $password)
    {
        $this->dbName = $dbName;
        $this->port = $port;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->db = new PDO
        (
            $connexionString = "mysql:host=$host;port=$port;dbname=$dbName",
            $username,
            $password
        );
    }
    
    //GET ALL USERS
    public function getAllUsers() : array
    {
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    
    //GET USER BY ID
    public function getUserById(int $id) : User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$id]);
        $fetch = $query->fetch(PDO::FETCH_ASSOC);
        $firstName = $fetch['first_name'];
        $lastName = $fetch['last_name'];
        $email = $fetch['email'];
        $user = new User($firstName, $lastName, $email);
        $user->setId($id);
        return $user;
    }
    
    //NEW USER
    public function createUser(User $user) : User
    {
        $query = $this->db->prepare("INSERT INTO users (first_name, last_name, email) VALUES (:firstName, :lastName, :email)");
        $parameters = 
        [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail()
        ];
        $query->execute($parameters);
        $id = $this->db->lastInsertId();
        $user->setId($id);
        return $user;
    }
    
    //EDIT USER
    public function editUser(User $user) : void
    {
        $query = $this->db->prepare(
            "UPDATE users 
            SET first_name = :firstName, last_name = :lastName, email = :email
            WHERE id = :id");
        $parameters =
        [
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'id' => $user->getId()
        ];
        $query->execute($parameters);
    }
    
    //DELETE USER
    public function deleteUser(int $id) : void
    {
        $query = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $query->execute([$id]);
    }
    
    //READ USER
    // public function readUser(User $user) : User
    // {
    //     $query = $this->db->prepare("SELECT * FROM users WHERE id = ?");
    //     $query->execute([$user->getId()]);
    //     $fetch = $query->fetch(PDO::FETCH_ASSOC);
    //     $firstName = $fetch['first_name'];
    //     $lastName = $fetch['last_name'];
    //     $email = $fetch['email'];
    //     $id = $fetch['id'];
    //     $user = new User($firstName, $lastName, $email);
    //     $user->setId($id);
    //     return $user;
    // }
}

?>