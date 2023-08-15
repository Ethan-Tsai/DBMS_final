<?php
session_start();
include("../config.php");
?>
<!---->
<!-- 清空cart -->
<!--建立order-->
<!--算分數-->

<?php



$user=$_POST["user"];
$price=$_POST["price"];



$tran_point="UPDATE `member` SET `transPoint` = transPoint+$price/10 WHERE `member`.`mId` = $user";
$db->exec($tran_point);


$sql=$db->query("SELECT *FROM cart_new WHERE `user_id`=$user");

foreach($sql as $row){
    $bookname=$row["bookname"];
    $mid=$row["book_mid"];

$dele_book="DELETE FROM `book` WHERE `bookname`='$bookname' AND `mid`='$mid'";
$db->exec($dele_book);
$dele_cart="DELETE FROM `cart_new` WHERE `user_id`=$user";
$db->exec($dele_cart);

}
?>

<script>
    location.href='../profile/profile.php';
</script>