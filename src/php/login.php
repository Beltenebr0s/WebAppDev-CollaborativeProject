<?php
    // Logs the user into the web page
    //----------------------------------
    include "database.php";
    // Start the session
    session_start();

    $type = $_POST["loginType"];
    $user_id = $_POST["user"];
    $passwd = $_POST["passwd"];

    
    // It doesn't matter the mode of login (id or email) we'll 
    // transform it to a id login anyway, so we don't have to create
    // two different 
    if($type == 0){
        // Logged in with Tec ID 
        $user_id = strtolower($user_id);
    } else {
        // Logged in with Tec email
        $user_id = strtolower($user_id);
        $user_id = explode("@", $user_id)[0];
    }

    // Connect to database and all
    // $db = mysqli_connect("localhost:8889", "root", "root", "take_it");
    $db = db_connection();

    // First retrieve the user
    $sql = "select id, real_name, passwd from users where enrollment_number = '$user_id'";
    $result = db_query($db, $sql, "Error retrieving the user from the database.");
    // Check the password
    $data = $result->fetch_assoc();
    if(md5($passwd) == $data['passwd']){
        // Set the session to this user
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['user_name'] = $data['real_name'];
        header("Location: ./main_page.php");
    } else {
        db_error_msg("Contraseña incorrecta.");
    }
    
?>