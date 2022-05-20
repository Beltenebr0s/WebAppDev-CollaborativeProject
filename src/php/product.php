<?php
    include 'database.php';
    // Show the chosen product's details
    // TODO: Add the images
    //-------------------------------------
    $html = file_get_contents("../../html_templates/product.html");
    $header = file_get_contents("../../html_templates/header.html");
    $html = str_replace("##header##", $header, $html);
    // 1. Get the product id from the URL
    $id = $_GET["id"];
    // 2. Retrieve the product from the database
    $db = db_connection();
    $sql = "SELECT p.id, title, product_description, owner_id, real_name, surname1, surname2, tec_email FROM products p join users u on (p.owner_id = u.id) WHERE p.id=1";
    // echo $sql;
    $result = db_query($db, $sql);
    // 3. Fill the template with the data
    $data = $result->fetch_assoc();
    $html = str_replace("##title##", $data['title'], $html);
    $html = str_replace("##description##", $data['product_description'], $html);
    $html = str_replace("##name##", $data['real_name'] . " ".$data['surname1'] . " ".$data['surname2'], $html);
        // Email link
    $mail = "<a href='mailto:".$data['tec_email']."'>".$data['tec_email']."</a>";
    $html = str_replace("##email##", $mail, $html); 

    // Display the page
    echo $html;
?>