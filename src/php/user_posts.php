<?php
    include "database.php";
    session_start();
    // Get the user id
    $user = $_SESSION['user_id'];
    // Split the page to create the table
    $html = file_get_contents("../../html_templates/user_posts.html");
    $slices = explode("##row##", $html);
    // Get the posts from the user
    $sql = "SELECT * FROM products where owner_id = '$user'";
    $db = db_connection();
    $result = db_query($db, $sql);
    // Create the post list
    $post_list = "";
    while ($data = $result->fetch_assoc()){
        $aux = $slices[1];
        // Fill a product template with the data
        $temp = file_get_contents("../../html_templates/product_template.html");
        $temp = str_replace("##id##", $data['id'], $temp);
        $temp = str_replace("##title##", $data['title'], $temp);
        $temp = str_replace("##description##", $data['product_description'], $temp);
        $temp = str_replace("##owner##", "You", $temp);
        // Put the product in the row
        $aux = str_replace("##content##", $temp, $aux);
        $post_list .= $aux;
    }

    $page = $slices[0].$post_list.$slices[2];
    echo $page;
?>