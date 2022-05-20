<?php
    function db_connection(){
        $db = mysqli_connect("localhost:8889", "root", "root", "take_it");
        return $db;
    }
    function db_query($db, $sql) {
        if ($result = $db->query($sql)){
            return $result;
        } else {
            echo "error";
        }
    }
?>