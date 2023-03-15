<?php
    include "../classes/User.php";

    #Instantiate object
    $user = new User;

    #Call the method(store method)
    $user->store($_POST);  //$_POST is holding our data
?>