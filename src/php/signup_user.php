<?php
    include "database.php";
    // Adds the new user to the database
    //------------------------------------
    // Grab the information from the form
    $name = $_POST["name"];
    $surname1 = $_POST["surname1"];
    $surname2 = NULL;
    if(isset($_POST["surname2"])){
        $surname2 = $_POST["surname2"];
    }
    $email = strtolower($_POST["email"]);
    $enrollment = explode("@", $email)[0];
    $pwd1 = $_POST["passwd1"];
    $pwd2 = $_POST["passwd2"];
    $campus = $_POST["campus"];
    // Server side validation
    // -------------------------------

    // Introduce the user into the database
    // -------------------------------
    // Connect to the database
    $db = db_connection();
    // The $campus variable contains the name of the campus -- we need the id
    $query = "SELECT id FROM campuses WHERE campus_name='$campus'";
    $campus_id = NULL;
    $result = db_query($db, $query, "Error selecting the campus.");
    $campus_id = $result->fetch_assoc()['id'];
     
    // Hash the password for security with MD5 encryption
    $password = md5($pwd1);
    // Write the database query
    $query = "INSERT INTO `users` (`id`, `real_name`, `surname1`, `surname2`, `enrollment_number`, `tec_email`, `passwd`, `campus_id`)
             VALUES (NULL, '$name', '$surname1', '$surname2', '$enrollment', '$email', '$password', '$campus_id')";

    // Insert new user into the database
    $result = db_query($db, $query, "Error inserting the new user.");
    // If the insert succeeds, start the session
    session_start();
    $_SESSION['user_name'] = $name;
    $sql =  "SELECT max(id) as id from users";
    $result = db_query($db, $sql, "Error getting the user id.");
    $_SESSION['user_id'] = $result->fetch_assoc()['id']; 
    header("Location: ./main_page.php");
    
    
?>