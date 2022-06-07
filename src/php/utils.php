<?php
    function add_header($html){
        $header = file_get_contents("../../html_templates/header.html");
        $html = str_replace("##header##", $header, $html);
        return $html;
    }

?>