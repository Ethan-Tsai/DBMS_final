<?php
include("../config.php");


$bookname = $_POST["bookname"];
$ISBN = $_POST["ISBN"];
$condition = $_POST["condition"];
$state=$_POST["state"];
$price=$_POST["price"];
$dep=$_POST["dep"];
$mid=$_POST["mid"];


if (is_uploaded_file($_FILES["cover_pic"]["tmp_name"])) {

    move_uploaded_file($_FILES["cover_pic"]["tmp_name"], "../img/book/".$mid."/".$ISBN.".jpg");

    $pic_route = "../img/book/".$mid."/".$ISBN.".jpg";
}else{
    print "Error: required file not uploaded";
}

$cha = "UPDATE `book` SET `ISBN`=$ISBN,`condition`='$condition',`state`='$state',`price`=$price,`dep`='$dep' 
WHERE `bookname`='$bookname' AND `mid`=$mid";
$db->exec($cha);
?>
<script>
    alert("Update success!");
    location.href='javascript:history.go(-2)';
</script>

