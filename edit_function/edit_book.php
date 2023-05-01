<?php
include("../config.php");
// $bookname = $_POST["bookname"];
// $mid=$_POST["mid"];
$bookname="大家的日本語";
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
    <title>修改</title>
</head>

<body>
    <div style="    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: space-evenly;
    align-items: center;
    align-content: center;">
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

    <!--form-->
    <div>
        <form action="./editbook_action.php" method="post" id="add_form" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="bookname" class="form-label">Bookname:</label>
                <input type="text" class="form-control" id="bookname" name="bookname" value="<?=$row["bookname"]?>" readonly>

                <label for="title" class="form-label">ISBN:</label>
                <input type="text" class="form-control" id="ISBN" name="ISBN" value="<?=$row["ISBN"]?>">

                <label for="dep" class="form-label" >開課單位:</label>
                <select name="dep" id="dep" value="<?=$row["dep"]?>">
                        <option value="1">資管</option>
                        <option value="2">外文</option>
                        <option value="3">博雅</option>
                    </select>
            </div>
            <hr>
            <div>
                <label for="condition">請描述書況</label>
                <textarea name="condition" id="condition" cols="30" rows="8"><?=$row["condition"]?></textarea>
            </div>
            <hr>
            <div>
                <label for="state">新舊程度</label>
                <select name="state" id="state" value="<?=$row["state"]?>">
                <option value="1">全新未使用</option>
                <option value="2">8成新以上</option>
                <option value="3">其他</option>
            </select>
            </div>
            <hr>
            <div>
                <label for="cover_pic" class="form-label">Upload your picture!</label>
                <input type="file" name="cover_pic" id="cover_pic">
            </div>
            <hr>
            <div>
                <label for="price">修改售價: </label>
                <input type="number" id="price" name="price" min="1" max="10000" value="<?=$row["price"]?>">

            </div>

            <input type="hidden" value="<?=$mid?>" name="mid">

            <hr>
            <button type="submit">Update!</button>
        </form>
    </div>
    <!--END_form-->
    </div>
    
</body>

</html>
<?php
}
?>