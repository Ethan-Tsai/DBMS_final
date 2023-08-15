<?php
session_start();
include("../config.php");
$bookname = $_POST["bookname"];
$mid=$_SESSION["user_id"];

$sql = $db->query("SELECT * FROM book WHERE bookname = '$bookname' AND `mId`=$mid");
foreach($sql as $row){
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Delete Book</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="./dele.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css" defer>
        <link rel="stylesheet" href="dele.css">   
    </head>

    <body>

<?php
        // if ($_SERVER["REQUEST_METHOD"] == "GET") { # normal GET request; display self-submitting form
?>
        <!--show-->
        <h1>Delete Book</h1>

        <div id="dele_form">

            <div id="what_book">
                <p>Bookname: <?=$row["bookname"]?></p>

                <span>ISBN: <?=$row["ISBN"]?></span>

                <span>Department: <?=$row["dep"]?></span>                        
            </div>

            <div>
                <p>Description:<?=$row["condition"]?></p>
            </div>

            <div>
                <p>State: <?=$row["state"]?></p>   
            </div>

            <div>
                <p>Book photo:</p>
                <img src="<?=$row["picture"]?>" alt="" width="150px">
            </div>

            <div>
                <p>Price: <?=$row["price"]?></p>
            </div>

            <form action="./dele_action.php" method="post" onsubmit="return realy(this)" id = "form">
                <input type="hidden" value="<?=$mid?>" name="mid">
                <input type="hidden" value="<?=$bookname?>" name="bookname">
                <button type="submit">DELETE!</button> 
            </form>

        </div>
        <!--END_show-->

        

<?php
}
?>

    </body>
    </html>

<?php
// }
?>
