<?php
    // Here we should check the user connected but we don't have users yet let alone sessions lol

    // Show the products in the main page
    // This should also be done retrieving them from the database but I'm going to try just to see if it works

    // 1. Get the main page template
    $html = file_get_contents("../../html_templates/main_page_template.html");
    // 2. Split the page in the ##table-row## tag
    $slices = explode("##table-row##", $html); // This creates an array of text separated on the selected substring
    // 3. Create the table with all the products
        // This is the part where we should get the info from the database
    $table = "";
    $row = file_get_contents("../../html_templates/product_template.html");
    for ($i = 0; $i < 10; $i++){
        $aux = $slices[1];
        $aux = str_replace("##row-content##", $row, $slices[1]);
        $aux = str_replace("##id##", $i, $aux);
        $table .= $aux;
    }

    // 4. Create the final html page
    // Add the header
    $header = file_get_contents("../../html_templates/header.html");
    $slices[0] = str_replace("##header##", $header, $slices[0]);
    // Join everything
    $page = $slices[0].$table.$slices[2];

    echo $page;
?>