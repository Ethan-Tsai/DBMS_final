<?php

$db = new PDO("mysql:dbname=DBMS_final;host=localhost", "root", "");

    if(!$db){
        printf("connect db failed");
        exit();
    }

?>