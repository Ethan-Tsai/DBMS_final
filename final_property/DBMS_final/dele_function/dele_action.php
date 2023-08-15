<?php
include("../config.php");
?>

<?php

$bookname = $_POST["bookname"]; 
        $mid=$_POST["mid"]; 
        $dele=" DELETE FROM `book` WHERE `bookname`='$bookname' AND `mid`='$mid' ";
        $db->exec($dele);
?>
<script>
    alert("Delete success!");
    location.href='javascript:history.go(-2)';
</script>