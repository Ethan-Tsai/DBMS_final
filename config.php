<?php

$db = new PDO("mysql:dbname=dbms_final;host=localhost", "root", "c09010011");

    if(!$db){
        printf("connect db failed");
        exit();
    }

?>