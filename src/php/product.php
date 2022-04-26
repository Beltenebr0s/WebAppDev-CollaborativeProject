<?php
    $id = $_GET["id"];
    $html = file_get_contents("../../html_templates/product.html");
    $header = file_get_contents("../../html_templates/header.html");
    $html = str_replace("##header##", $header, $html);
    echo $html;
?>