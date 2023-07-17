<?php

$uc = new UserController();

if($route === "create-user")
{
    $uc->create();
}
else if($route === "edit-user" && isset($_GET["user_id"]))
{
    $uc->edit(intval($_GET["user-id"]));
}
else if($route === "delete-user" && isset($_GET["user_id"]))
{
    $uc->delete(intval($_GET["user-id"]));
}
else if($route === "read-user" && isset($_GET["user_id"]))
{
    $uc->read(intval($_GET["user-id"]));
}
else if($route === "read-all-users")
{
    $uc->readAll();
}
else
{
    echo "404 : Page Not Found";
}