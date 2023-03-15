<?php
    include "../classes/User.php";

    #instantiate an object
    $user = new User;

    #Call the login method
    $user->login($_POST);
?>


