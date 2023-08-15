<?php
include("../config.php");
$dId=$_GET["dId"];

$sql="UPDATE `description` SET `like_num` = `like_num`+1 WHERE `description`.`dId` = $dId;";
$db->exec($sql);

$like=$db->query("SELECT * FROM `description`WHERE `description`.`dId` = $dId;");

foreach($like as $num){
    ?>
    <?=$num["like_num"]?>
    <?php
}

?>