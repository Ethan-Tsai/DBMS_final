
<?php

include("../config.php");
$mId=$_POST["mId"];

$sql = $db->query("SELECT *FROM `member` WHERE `mId`='$mId'");
foreach($sql as $row){
    $name=$row["name"];
    $department = $row["department"];
    $phone=$row["phoneNumber"];
    $pic_route=$row["image"];
    // $password = $row["password"];
}
$name=$department=$phone=$password=0;
if(isset($_POST["name"])){
    $name = $_POST["name"];
}
if(isset($_POST["department"])){
    $department = $_POST["department"];
}
if(isset($_POST["phone"])){
    $phone=$_POST["phone"];
}
// if(isset($_POST["password"])){
//     $password = $_POST["password"];
// }
// if(isset($_POST["confirm_password"])){
//     $confirm_password = $_POST["confirm_password"];
// }



if (is_uploaded_file($_FILES["progressbarTW_img"]["tmp_name"])) {

    move_uploaded_file($_FILES["progressbarTW_img"]["tmp_name"], "../img/profile/".$mId.".jpg");

    $pic_route = "../img/profile/".$mId.".jpg";
}else{
    print "Error: required file not uploaded";
}
echo $mId;
echo $pic_route;
$new = "UPDATE `member` SET `name`='$name',`department`='$department',`phoneNumber`=$phone, `image` = '$pic_route' WHERE `mId`=$mId";
// echo $new;
$db->exec($new);

?>
<script>
    alert("Update success!");
    location.href='./profile.php';
    
</script>
