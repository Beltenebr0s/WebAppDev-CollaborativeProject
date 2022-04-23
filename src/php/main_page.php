<?php
    // Here we should check the user connected but we don't have users yet let alone sessions lol

    // Show the products in the main page
    // This should also be done retrieving them from the database but I'm going to try just to see if it works

    // 1. Get the main page template
    $html = file_get_contents("../templates/main_page_template");
    // 2. Split the page in the ##table-row## tag
    $slices = explode("##table-row##", $html); // This creates an array of
?>