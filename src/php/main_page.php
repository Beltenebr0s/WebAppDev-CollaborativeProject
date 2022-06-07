<?php
    include 'database.php';
    // Show the products in the main page
    // TODO: Add an image to the post
    //-----------------------------------------------------------
    session_start();
    if (!isset($_SESSION['user_id'])){
        header("Location: ../../index.html");
    }
    // 1. Get the main page template
    $html = file_get_contents("../../html_templates/main_page_template.html");
    // 2. Split the page in the ##table-row## tag
    $slices = explode("##table-row##", $html); // This creates an array of text separated on the selected substring
    // 3. Create the table with all the products
        // 3.1. Connect to the database
    $db = db_connection();
        // 3.2. Get all the products
    $sql = "select p.id, p.title, p.product_description, u.real_name, u.surname1, u.surname2, i.img_name from products p join users u on (p.owner_id = u.id) left join images i on (p.id = i.product_id)";
    $img_dir  = "../../img/";
    $result = db_query($db, $sql, "Error retrieving the products from the database.");
        // 3.3. Fill the table with the data from the query
    $table = "";
    $row = file_get_contents("../../html_templates/product_template.html");
    while ($data = $result->fetch_assoc()){
        $aux = $slices[1];
        $aux = str_replace("##row-content##", $row, $slices[1]);
        $aux = str_replace("##id##", $data['id'], $aux);
        $aux = str_replace("##title##", $data['title'], $aux);
        $aux = str_replace("##description##", $data['product_description'], $aux);
        $aux = str_replace("##owner##", $data['real_name'] . " ".$data['surname1'] . " ".$data['surname2'], $aux);
        if($data['img_name'] != NULL){
            $aux = str_replace("##image##", $img_dir.$data['img_name'], $aux);
        } else {
            $aux = str_replace("##image##", $img_dir."no-image.jpg", $aux);
        }
        
        $table .= $aux;
    }
    // 4. Create the final html page
        // 4.1. Add the header
    $header = file_get_contents("../../html_templates/header.html");
    $slices[0] = str_replace("##header##", $header, $slices[0]);
    $slices[0] = str_replace("##user-name##", $_SESSION['user_name'], $slices[0]);
        // 4.2. Join everything
    $page = $slices[0].$table.$slices[2];

    echo $page;
?>