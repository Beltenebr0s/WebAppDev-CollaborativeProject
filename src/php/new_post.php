<?php
    session_start();    
    include "database.php";
    // Adds the new product to the database
    //--------------------------------------
    // 1. Get the form fields
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    // Clean the input
    $title = str_replace("'", "\'", $title);
    $desc = str_replace("'", "\'", $desc);
    $category = $_POST['category'];
    // Get the id from the category name
    $db = db_connection();
    $sql = "SELECT id FROM categories WHERE category_name='$category'";
    $result = db_query($db, $sql, "Error finding the category for the product.");
    $data = $result->fetch_assoc();
    $category_id = $data['id']; 
    // Insert the product and get the id
    $user = $_SESSION['user_id'];
    $sql = "INSERT into products VALUES (NULL, '$title', '$desc', '$user')";
    $result = db_query($db, $sql, "Error inserting the product in the database.");
    // Get the new product's id
    $sql =  "SELECT max(id) as id from products";
    $result = db_query($db, $sql, "Error getting the product id");
    $product_id = $result->fetch_assoc()['id'];
    // Instert the relation between product and category
    $sql = "INSERT INTO category_product VALUES ('$category_id','$product_id')";
    $result = db_query($db, $sql, "Error assigning the product its category");
    // Save the images in the server
    $target_directory = "../../img/";
    // Change the name of the file. As a general rule, for security reasons 
    // we should not allow the user to choose the name of the file
    // It generates a set of random bytes (from a random size between 10 and 20 B),
    // then it converts it to hexadecimal encoding
    $file_name = bin2hex(random_bytes(rand(10, 20))) . ".jpg";
    $target_file = $target_directory . $file_name;
    // Move the image to the selected directory
    if (!move_uploaded_file($_FILES['files']['tmp_name'], $target_file)){
        db_error_msg("Error uploading the image");
    }
    // Store the image name in the database
    $sql = "INSERT INTO images VALUES (NULL, '$file_name','$product_id')";
    $result = db_query($db, $sql, "Error inserting the image in the database");
    
    db_success();
?>