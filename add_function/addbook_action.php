<?php
include("../config.php");


$bookname = $_POST["bookname"];
$ISBN = $_POST["ISBN"];
$condition = $_POST["condition"];
$state=$_POST["state"];
$price=$_POST["price"];
$dep=$_POST["dep"];
$mid=$_POST["mid"];
$mid="2";

if (is_uploaded_file($_FILES["cover_pic"]["tmp_name"])) {

    move_uploaded_file($_FILES["cover_pic"]["tmp_name"], "../img/book/".$mid."/".$ISBN.".jpg");

    $pic_route = "../img/book/".$mid."/".$ISBN.".jpg";
}else{
    print "Error: required file not uploaded";
}

$add = "INSERT INTO `book` (`bookname`,`mid`,`ISBN`,`picture`,`condition`,`state`,`price`,`dep`) VALUES('$bookname','$mid','$ISBN',' $pic_route','$condition','$state','$price','$dep')";
$db->exec($add);
?>
<script>
    alert("Upload success!");
    location.href='javascript:history.go(-2)';
</script>

