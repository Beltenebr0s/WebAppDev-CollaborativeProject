<?php
    $type = $_POST["loginType"];
    $user = $_POST["user"];
    $passwd = $_POST["passwd"];

    if($type == 0){
        // Logged in with Tec ID 
    } else {
        // Logged in with Tec email
    }

    // Make sure it's a Tec account

    // Connect to database and all


    // If there's no error, redirect to the main page
    header("Location: ./main_page.php");
?>