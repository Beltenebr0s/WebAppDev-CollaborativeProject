<?php
    include 'database.php';
    // Show the chosen product's details
    //-------------------------------------
    session_start();
    $html = file_get_contents("../../html_templates/product.html");
    $header = file_get_contents("../../html_templates/header.html");
    $html = str_replace("##header##", $header, $html);
    $html = str_replace("##user-name##", $_SESSION['user_name'], $html);
    // 1. Get the product id from the URL
    $id = $_GET["id"];
    // 2. Retrieve the product from the database
    $db = db_connection();
    $sql = "SELECT p.id, title, product_description, owner_id, real_name, surname1, surname2, tec_email FROM products p join users u on (p.owner_id = u.id) WHERE p.id=$id";
    // echo $sql;
    $result = db_query($db, $sql, "Error retrieving the product information");
    // 3. Fill the template with the data
    $data = $result->fetch_assoc();
    $html = str_replace("##title##", $data['title'], $html);
    $html = str_replace("##description##", $data['product_description'], $html);
    $html = str_replace("##name##", $data['real_name'] . " ".$data['surname1'] . " ".$data['surname2'], $html);
        // Email link
    $mail = "<a href='mailto:".$data['tec_email']."'>".$data['tec_email']."</a>";
    $html = str_replace("##email##", $mail, $html); 

    // Get the images for the product
    $sql = "SELECT img_name FROM images where product_id = $id";
    $result = db_query($db, $sql, "Error getting the images of the product.");
    $img_name = $result->fetch_assoc()['img_name'];
    $dir = "../../img/";
    if($img_name != NULL){
        $html = str_replace("##main-image##", $dir.$img_name, $html);
    } else {
        $html = str_replace("##main-image##", $dir."no-image.jpg", $html);
    }
    
    // This will be for when we have more than one img per product
    // while ($data = $result->fetch_assoc()){

    // }
    // Display the page
    echo $html;
?>