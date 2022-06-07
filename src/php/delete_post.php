<?php
    include "database.php";
    // Deletes a product from the database and everything it references
    // ------------------------------------------------------------------
    // Get the product id
    $id = $_GET['id'];
    // Get the image name (to remove it from the server files)
    $db = db_connection();
    $sql = "SELECT img_name FROM images where product_id='$id'";
    $result = db_query($db, $sql, "Error getting the images from the database.");
    $img_name = $result->fetch_assoc()['img_name'];
    // Remove the product from the database
    $sql = "DELETE FROM products where id = '$id'";
    $result = db_query($db, $sql, "Error deleting the product.");
    // Delete the images
    if(unlink("../../img/".$img_name)) {
        db_success();
    } else {
        db_error_msg("Error removing the image.");
    }
    // echo "eey";
?>