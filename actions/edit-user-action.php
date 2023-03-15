<?php
include '../classes/User.php';

#instatiate an object
$user = new User;

$user->update($_POST, $_FILES);

?>

