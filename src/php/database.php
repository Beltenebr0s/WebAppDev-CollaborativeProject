<?php
    function db_connection(){
        $db = mysqli_connect("localhost:8889", "root", "root", "take_it");
        return $db;
    }
    function db_query($db, $sql, $error_msg) {
        if ($result = $db->query($sql)){
            return $result;
        } else {
            echo db_error_msg($error_msg);
        }
    }
    function db_error_msg($msg){
        $html = file_get_contents("../../html_templates/error.html");
        $html = str_replace("##msg##", $msg, $html);
        echo $html;
        exit(-1);
    }

    function db_success(){
        $html = file_get_contents("../../html_templates/success.html");
        echo $html;
    }
?>