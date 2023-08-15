<?php
session_start();
include("../config.php");
$user_id=$_SESSION["user_id"];
    $sql = $db->query("SELECT * FROM `cart_new` WHERE `user_id` = '$user_id'");
    $num=$sql->rowCount();
?>
    
    
<?=$num?>

  



    
