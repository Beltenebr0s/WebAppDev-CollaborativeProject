<?php
    include "database.php";
    session_start();
    // Get the user id
    $user = $_SESSION['user_id'];
    // Split the page to create the table
    $html = file_get_contents("../../html_templates/user_posts.html");
    $slices = explode("##row##", $html);
    // Add the header to the page
    $header = file_get_contents("../../html_templates/header.html");
    $slices[0] = str_replace("##header##", $header, $slices[0]);
    $slices[0] = str_replace("##user-name##", $_SESSION['user_name'], $slices[0]);
    // Get the posts from the users
    $sql = "SELECT p.id, p.title, p.product_description, i.img_name FROM products p left join images i on (p.id = i.product_id) where owner_id = '$user'";
    $db = db_connection();
    $result = db_query($db, $sql, "Error getting the user posts.");
    // Create the post list
    $post_list = "";
    $img_dir = "../../img/";
    while ($data = $result->fetch_assoc()){
        $aux = $slices[1];
        // Fill a product template with the data
        $temp = file_get_contents("../../html_templates/product_template.html");
        $temp = str_replace("##id##", $data['id'], $temp);
        $temp = str_replace("##title##", $data['title'], $temp);
        $temp = str_replace("##description##", $data['product_description'], $temp);
        $temp = str_replace("##owner##", "You", $temp);
        if($data['img_name'] != NULL){
            $temp = str_replace("##image##", $img_dir.$data['img_name'], $temp);
        } else {
            $temp = str_replace("##image##", $img_dir."no-image.jpg", $temp);
        }
        // Put the product in the row
        $aux = str_replace("##content##", $temp, $aux);
        $post_list .= $aux;
    }

    $page = $slices[0].$post_list.$slices[2];
    echo $page;
?>