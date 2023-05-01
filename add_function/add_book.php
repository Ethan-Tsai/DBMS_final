<?php
session_start();
// if (!(isset($_SESSION["DBMS_final"]))) {
//     echo "<script>";
//     echo "alert('請先登入');";
//     echo "location.href='../../login/login_index.php';";
//     echo "</script>";
//     exit();
// }
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sell your book!</title>
    </head>

    <body>
        <!--form-->
        <div>
            <form action="./addbook_action.php" method="post" id="add_form" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="bookname" class="form-label">Bookname:</label>
                    <input type="text" class="form-control" id="bookname" name="bookname">

                    <label for="ISBN" class="form-label">ISBN:</label>
                    <input type="text" class="form-control" id="ISBN" name="ISBN">

                    <label for="dep" class="form-label">開課單位:</label>
                    <select name="dep" id="dep">
                        <option value="1">資管</option>
                        <option value="2">外文</option>
                        <option value="3">博雅</option>
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
        </div>
        <!--END_form-->
    </body>

    </html>