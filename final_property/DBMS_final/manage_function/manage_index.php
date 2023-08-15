<?php
session_start();
if (!(isset($_SESSION["user_id"]))) {
    echo "<script>";
    echo "alert('請先登入');";
    echo "location.href='../main/login_function.php';";
    echo "</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Book</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../all_book/theme.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css">
</head>

<body>

<h1>Manage Book</h1>
<button id= "button_back"class="BackHome" type="button" ><a href = "../all_book/Home.php" >Back</a></button>

<div class="row mx-n2">
    <?php
    include("../config.php");
$id=$_SESSION["user_id"];
$sql = $db->query("SELECT *FROM`book` as b JOIN `member` as m ON b.mid=m.mid WHERE b.mid=$id ORDER BY `update_time`DESC"); //upload here
$num=0;

foreach ($sql as $row) {
    if($num%4==0){
        ?>
    <img src="../img/book/col.jpg" alt="" style="padding-bottom: 50px; height:100px">
    <hr>
    <?php
    }?>

    <div class="col-lg-3 col-md-4 col-sm-5 px-2 mb-grid-gutter">
        <!-- Product-->
        <div class="card product-card-alt">
            <div class="product-thumb">
                <!-- <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button> -->
                <div class="product-card-actions">
                <!-- <button type="submit">編輯更新</button> -->
                    <form action="../edit_function/edit_book.php" method="post">
                    <!-- <a class="btn btn-light btn-icon btn-shadow fs-base mx-2"href="" type="submit">
                    </a> -->
                    <input type="hidden" name="bookname" value="<?=$row['bookname']?>">
                    <input type="submit" style="padding-right:90px margin:10px" value="編輯更新"></input>
                    </form>
                    <!-- <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"> -->
                        <!-- <i class="ci-cart"></i> -->
                        <form action="../dele_function/dele.php" method="post">
                    <!-- <a class="btn btn-light btn-icon btn-shadow fs-base mx-2"href="" type="submit">
                    </a> -->
                    <input type="hidden" name="bookname" value="<?=$row['bookname']?>">
                    <!-- <button type="submit">刪除此筆書</button> -->
                    <input type="submit" style="padding-right:90px margin:10px" value="刪除此筆書"></input>
                    </form>
                        <!-- </button> -->
                </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img
                    src="<?=$row['picture']?>" alt="Product">
            </div>
            <hr>
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                    <div class="text-muted fs-xs me-1">
                        <?=$row['dep']?><a class="product-meta fw-medium" href="#"></a> <a
                            class="product-meta fw-medium" href="#"></a>
                    </div>

                    <!-- <div class="star-rating">
            <i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
          </div> -->
                    <h5><small>Upload by: </small><em>
                            <?=$row['name']?>
                        </em> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg></h5>

                    <p style="color:#A79770">
                        <?=$row['condition']?>
                    </p>

                </div>
                <h2 class="product-title fs-sm mb-2"><a href="marketplace-single.html" style="font-size:28px">

                        <?=$row['bookname']?>

                    </a></h2>
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="fs-sm me-2">
                        <!-- <i class="ci-download text-muted me-1"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                        </svg>
                        <span class="fs-xs ms-1">
                            <?=$row['state']?>
                        </span>
                    </div>
                    <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">
                        <?=$row['price']?><small>.00</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php


    $num++;
}
?>
    <img src="../img/book/col.jpg" alt="" style="padding-bottom: 50px; height:100px">
    </div>


    <!--ENDbrowse_book-->
   


</body>

</html>