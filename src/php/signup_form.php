<?php
    // For the signup form, it fills the dropdown select input
    // with the list of campus
    //----------------------------------------------------------
    // Grab the html template
    $html = file_get_contents("../../signup.html");
    // Database connection
    $db = mysqli_connect("localhost:8889", "root", "root", "take_it");
    // Write the query
    $sql = "select * from campuses";

    // Splits the html template to fill out the 
    // campus dropdown menu
    $slices = explode("##option_row##", $html);

    $dropdown_options = "";
    if($resultado = $db->query($sql)){
        while ($data = $resultado->fetch_assoc()){
            // Grab the dropdown item 
            $aux = $slices[1];
            $aux = str_replace("##option_name##", $data["campus_name"], $aux);
            $aux = str_replace("##option_id##", $data["id"], $aux);
            $dropdown_options .= $aux;
        }
    } else {
        echo "error";
    }

    // Join the page again
    $page = $slices[0].$dropdown_options.$slices[2];
    echo $page;

?>