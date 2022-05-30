<?php
    include "database.php";
    session_start();
    $html = file_get_contents("../../new_post_form.html");
    // Add the header to the page
    $header = file_get_contents("../../html_templates/header.html");
    $header = str_replace("##user-name##", $_SESSION['user_name'], $header);
    $html = str_replace("##header##", $header, $html);

    // Add the categories to the html select dropdown
    $db = db_connection();
    $sql = "select * from categories";
    $result = db_query($db, $sql);
    $slices = explode("##row##", $html);
    $dropdown = "";
    while ($data = $result->fetch_assoc()){
        $aux = $slices[1];
        $aux = str_replace("##category-id##", $data['id'], $aux);
        $aux = str_replace("##category-name##", $data['category_name'], $aux);
        $dropdown .= $aux;
    }

    // Build the page again
    $page = $slices[0].$dropdown.$slices[2];
    echo $page;

?>