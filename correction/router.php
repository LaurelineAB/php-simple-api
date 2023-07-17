<?php 

if($route === "create-user")
{
    
}
else if($route === "edit-user" && isset($_GET["user_id"]))
{
    
}
else if($route === "delete-user" && isset($_GET["user_id"]))
{
    
}
else if($route === "read-user" && isset($_GET["user_id"]))
{
    
}
else if($route === "read-all-users")
{
    
}
else
{
    echo "404 : Page Not Found";
}