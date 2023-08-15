<?php
session_start();
if (!(isset($_SESSION["user_id"]))) {
    echo "<script>";
    echo "alert('請先登入');";
    echo "location.href='../main/login_function.php';";
    echo "</script>";
    exit();
}
$mid=$_SESSION["user_id"]
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css" defer>
        <link rel="stylesheet" href="add_book.css">
        
        <title>Add Book</title>
    </head>

    <body>


    <h1>Add Book</h1>

<div id="form-wrapper">

<form action="./addbook_action.php" method="post" id="add_form" enctype="multipart/form-data">

<div>    
    <label for="bookname" class="form-label">Bookname</label>
    <input type="text" class="form-control" id="bookname" name="bookname">
</div>

<div>
    <label for="ISBN" class="form-label">ISBN</label>
    <input type="text" class="form-control" id="ISBN" name="ISBN">
</div>

<div>
    <label for="dep" class="form-label">Department used</label>
        <select name="dep" id="dep">
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
    <textarea name="condition" id="condition" cols="40" rows="5" placeholder="Enter book detail"></textarea>
</div>

<div>
    <label for="state">State</label>
    <select name="state" id="state">
        <option value=""> </option>
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
    <label for="cover_pic" class="form-label">Upload book picture</label>
    <input type="file" name="cover_pic" id="cover_pic">
</div>

<div>
    <label for="price">Price</label>
    <input type="number" id="price" name="price">
</div>
        
<input type="hidden" value="<?=$mid?>" name="mid">

<button type="submit">Launch</button>

</form>

</div>



        <!--form-->
        <!-- <div>
            <form action="./addbook_action.php" method="post" id="add_form" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="bookname" class="form-label">Bookname:</label>
                    <input type="text" class="form-control" id="bookname" name="bookname">

                    <label for="ISBN" class="form-label">ISBN:</label>
                    <input type="text" class="form-control" id="ISBN" name="ISBN">

                    <label for="dep" class="form-label">開課單位:</label>
                    <select name="dep" id="dep">
                        <option value="資管">資管</option>
                        <option value="外文">外文</option>
                        <option value="博雅">博雅</option>
                    </select>
                </div>
                <hr>
                <div>
                    <label for="condition">請描述書況</label>
                    <textarea name="condition" id="condition" cols="30" rows="8">Enter your description in here...</textarea>
                </div>
                <hr>
                <div>
                    <label for="state">新舊程度</label>
                    <select name="state" id="state">
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
                    <label for="price">請輸入price (between 0 and 10000):</label>
                    <input type="number" id="price" name="price" min="0" max="10000">

                </div>

                <input type="hidden" value="&lt;?=$mid?>" name="mid">

                <hr>
                <button type="submit">Add!</button>
            </form>
        </div> -->
        <!--END_form-->
    </body>

    </html>