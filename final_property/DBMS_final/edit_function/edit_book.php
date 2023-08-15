<?php
session_start();
include("../config.php");
$bookname = $_POST["bookname"];
$mid=$_SESSION["user_id"];

$sql = $db->query("SELECT * FROM `book` WHERE `bookname` = '$bookname' AND `mId`=$mid");
foreach($sql as $row){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css" defer>
    <link rel="stylesheet" href="edit_book.css">
    <title>Update Book</title>
</head>

<body>
<h1>Update Book</h1>

    <div class="container">
        
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
        <div class="separator"></div>
        <div class="right">
        <form action="./editbook_action.php" method="post" id="add_form" enctype="multipart/form-data">

            <div>
                <label for="bookname" class="form-label">Bookname</label>
                <input type="text" class="form-control" id="bookname" name="bookname" value="<?=$row["bookname"]?>">
            </div>

            <div>
                <label for="title" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="ISBN" name="ISBN" value="<?=$row["ISBN"]?>">
            </div>

            <div id="dep_div">
                <label for="dep" class="form-label" >Department</label>
                <select name="dep" id="dep" value="<?=$row["dep"]?>">
                <option value="資管">資管</option>
<option value="應數">應數</option>
<option value="外文">外文</option>
<option value="機電">機電</option>
<option value="海工">海工</option>
<option value="中文">中文</option>
<option value="跨院">跨院</option>
<option value="博雅">博雅</option>
                    </select>
            </div>

            <div>
                <label for="condition" id="description">Description</label>
                <textarea name="condition" id="condition" cols="40" rows="5"><?=$row["condition"]?></textarea>
            </div>

            <div id="state_div">
                <label for="state">State</label>
                <select name="state" id="state" value="<?=$row["state"]?>">
                    <option value="全新未使用">全新未使用</option>
                    <option value="8成新以上">8成新以上</option>
                    <option value="7成新以上">7成新以上</option>
                    <option value="6成新以上">6成新以上</option>
                    <option value="5成新以上">5成新以上</option>
                    <option value="5成新以下">5成新以下</option>
                    <option value="其他">其他</option>
                </select>
            </div>

            <div>
                <label for="cover_pic" class="form-label">Upload New Photo</label>
                <input type="file" name="cover_pic" id="cover_pic">
            </div>

            <div>
                <label for="price">New Price</label>
                <input type="number" id="price" name="price"  value="<?=$row["price"]?>">
            </div>

            <input type="hidden" value="<?=$mid?>" name="mid">

            <button type="submit">Update</button>

        </form>
    
        </div>
</div>

    
</body>

</html>
<?php
}
?>