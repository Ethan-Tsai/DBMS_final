<?php
$id=$_POST["id"];
$bookname=$_POST["bookname"];
$book="'$bookname'";
$user_id=43;
include("../config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../jquery-3.6.4.min.js"></script>
    <script src="to_cart.js"></script>
    <link rel="stylesheet" href="./cart.css">
    <script src="./cart_item.js"></script>
    <title>book</title>
</head>



<body>

<div class="right">


<button onclick="myFunction()" id="cart_img">購物車本人
    <?php
    $sql = $db->query("SELECT * FROM `cart_new` WHERE `user_id` = '$user_id'");
    $num=$sql->rowCount();

    ?>
    <?=$num?>
</button>
<div id="cart_item" style="display: none;">
<?php
foreach($sql as $row){?>
    <p>cart_item: <?=$row["bookname"]?></p>
    <?php
}
?>

    <form action="./checkout.php" method="POST">
        <button>結帳!</button>
    </form>

</div>
</div>

<?php


$sql = $db->query("SELECT * FROM `book` WHERE `bookname` = '$bookname' AND `mid`='$id'");
foreach($sql as $row){
?>


<div class="left">    
        <div id="current_form">

            <div>
                <p>Current Bookname: <?=$row["bookname"]?></p>
                
            </div>

            <div>
                <p>Current ISBN: <?=$row["ISBN"]?></p>
            </div>

            <div>
                <p>Current Department: <?=$row['dep']?></p> 
            </div>

            <div>
                <p>Current Description: <?=$row["condition"]?></p>
            </div>

            <div>
                <p>Current State: <?=$row['state']?></p>
            </div>

            <div>
                <p>Current photo</p>
                <img src="<?=$row["picture"]?>" alt="" width="150px">
            </div>

            <div>
                <p>Current Price: <?=$row["price"]?></p>
            </div>

        </div>        
        </div>

        
                <button id ="cart" onclick="cart(<?=$book?>,<?=$id?>)">加入購物車</button>
         <div id="warn">

         </div>

         <form action="./checkout.php" method="GET">
                                <input type="hidden" name="bookname" value="<?=$row['bookname']?>">
                                    <input type="hidden" name="mid" value="<?=$row['mId']?>">
                                    <button type="submit">直接結帳</button>
         </form>


        

<?php
}
?>





</body>

</html>