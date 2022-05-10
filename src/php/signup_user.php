<?php
    // Adds the new user to the database
    //------------------------------------
    // Grab the information from the form
    $name = $_POST["name"];
    $surname1 = $_POST["surname1"];
    $surname2 = NULL;
    if(isset($_POST["surname2"])){
        $surname2 = $_POST["surname2"];
    }
    $email = strtolower($_POST["email"];)
    $enrollment = explode("@", $email)[0];
    $pwd1 = $_POST["passwd1"];
    $pwd2 = $_POST["passwd2"];
    $campus = $_POST["campus"];


    // Connect to the database
    $db = mysqli_connect("localhost:8889", "root", "root", "take_it");
    // The $campus variable contains the name of the campus -- we need the id
    $query = "SELECT id FROM campuses WHERE campus_name='$campus'";
    $campus_id = NULL;
    if($result = $db->query($query)){
        $campus_id = $result->fetch_assoc()['id'];
    } else {
        echo "error :(";
    }
    // Write the database query
    $query = "INSERT INTO `users` (`id`, `real_name`, `surname1`, `surname2`, `enrollment_number`, `tec_email`, `passwd`, `campus_id`)
             VALUES (NULL, '$name', '$surname1', '$surname2', '$enrollment', '$email', '$pwd1', '$campus_id')";

    // Insert new user into the database
    if($db->query($query)){
        echo "signed in!";
    } else {
        echo "error";
    }
    
    
?>