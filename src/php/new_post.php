<?php
    session_start();    
    include "database.php";
    // Adds the new product to the database
    //--------------------------------------
    // 1. Get the form fields
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    // Get the id from the categoryr name
    $db = db_connection();
    $sql = "SELECT id FROM categories WHERE category_name='$category'";
    $resultado = db_query($db, $sql);
    $data = $resultado->fetch_assoc();
    $category_id = $data['id']; 
    // Insert the product and get the id
    $user = $_SESSION['user_id'];
    $sql = "INSERT into products VALUES (NULL, '$title', '$desc', '$user')";
    $result = db_query($db, $sql);
    // Get the new product's id
    $sql =  "SELECT max(id) as id from products";
    $result = db_query($db, $sql);
    $product_id = $result->fetch_assoc()['id'];
    // Instert the relation between product and category
    $sql = "INSERT INTO category_product VALUES ('$category_id','$product_id')";
    $result = db_query($db, $sql);
    echo "Product inserted successfully!";
?>