/*參考網址 https://www.youtube.com/watch?v=XhLAB1wwzNk*/
<?php
    include_once'includes/    .php'; //連結profile頁面
    $Bname = $_POST['B_name'];
    $ISBN = $_POST['ISBN'];
    $picture = $_POST['picture'];
    $condition = $_POST['condition'];
    $state = $_POST['B_state'];
    $price = $_POST['price'];
    $mId = ; //要怎麼連到member的資料

    $sql = "INSERT INTO book(B_name, ISBN, picture, condition, B_state, price) 
            VALUES ('$Bname', '$ISBN', $picture', '$condition', '$state', '$price');";

            //成功跳回profile頁面
           

