<?php
include("../config.php");
// $bookname = $_POST["bookname"];
// $mid=$_POST["mid"];
$bookname="test3";
$mid=2;
$sql = $db->query("SELECT * FROM `book` WHERE `bookname` = '$bookname' AND `mId`=$mid");
foreach($sql as $row){
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="./dele.js"></script>
        <title>修改</title>
    </head>

    <body>
<?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") { # normal GET request; display self-submitting form
?>
        <!--show-->
        <div>


            <div class="mb-3">
                <label for="" class="form-label">Bookname:</label>
                <?=$row["bookname"]?>

                    <label for="" class="form-label">ISBN:</label>
                    <?=$row["ISBN"]?>

                        <label for="" class="form-label">開課單位:</label>
                        <?=$row["dep"]?>
            </div>
            <hr>
            <div>
                <label for="">請描述書況</label>
                <textarea name="condition" id="condition" cols="30" rows="8" readonly><?=$row["condition"]?></textarea>
            </div>
            <hr>
            <div>
                <label for="">新舊程度</label>
                <?=$row["state"]?>
            </div>
            <hr>
            <div>
                <label for="" class="form-label">your picture!</label>
                <img src="<?=$row["picture"]?>" alt="" width="100px">
            </div>
            <hr>
            <div>
                <label for="price">the price:</label>
                <?=$row["price"]?>

            </div>



            <hr>


        </div>
        <!--END_show-->

        <form action="" method="post" onsubmit="return realy(this)">

            <input type="hidden" value="<?=$mid?>" name="mid">
            <input type="hidden" value="<?=$bookname?>" name="bookname">
            <button type="submit">DELETE!</button>
        </form>
<?php
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") { # POST request; user is submitting form back to here; process it $var1 = $_POST["param1"]; ... 
        
        $bookname = $_POST["bookname"]; 
        $mid=$_POST["mid"]; 
        $dele=" DELETE FROM `book` WHERE `bookname`='$bookname' AND `mid`='$mid' ";
        $db->exec($dele);
        ?>
<script>
    alert("Delete success!");
    location.href='javascript:history.go(-2)';
</script>
        <?php
        }
?>

    </body>

    </html>
   <?php
}
?> 