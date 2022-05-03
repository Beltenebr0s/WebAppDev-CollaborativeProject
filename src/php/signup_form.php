<?php
    $html = file_get_contents("../../signup.html");

    $db = mysqli_connect("localhost:8889", "root", "root", "take_it");

    $sql = "select * from campuses";

    if($resultado = $db->query($sql)){
        while ($datos = $resultado->fetch_assoc()){
            
        }
    } else {
        echo "error";
    }

?>