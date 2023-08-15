
  
    <?php
    include("../../config.php");
    ?>
                            <div class="row mx-n2">


<?php
$sql = $db->query("SELECT *FROM`book` as `b` LEFT JOIN `member` as `m` ON b.mid=m.mid ORDER BY `update_time`DESC"); //change user here
$num = 0;

foreach ($sql as $row) {

    if ($num % 4 == 0) {
        ?>
        <img src="../img/book/col.jpg" alt="" style="padding-bottom: 50px; height:100px">
        <hr>
        <?php
    } ?>


    <div class="col-lg-3 col-md-4 col-sm-5 px-2 mb-grid-gutter">
        <!-- Product-->
        <div class="card product-card-alt">
            <div class="product-thumb">
                <!-- <button class="btn-wishlist btn-sm" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></button> -->
                <div class="product-card-actions">
                    <a class="btn btn-light btn-icon btn-shadow fs-base mx-2"
                        href="./book_detail.php?book_name=<?= $row['bookname'] ?>&mId=<?= $row["mId"] ?>">詳細資料</a>
                    <!-- <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i
                    class="ci-cart"></i>
            </button> -->

                </div><a class="product-thumb-overlay"
                    href="./book_detail.php?book_name=<?= $row['bookname'] ?>& mId=<?= $row["mId"] ?>"></a><img
                    src="<?= $row['picture'] ?>" alt="Product">
            </div>
            <hr>
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                    <div class="text-muted fs-xs me-1">
                        <?= $row['dep'] ?><a class="product-meta fw-medium" href="#"></a> <a
                            class="product-meta fw-medium" href="#"></a>
                    </div>
                    <hr>
                    <!-- <div class="star-rating">
    <i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
  </div> -->
                    <h5><small>Date: </small><em>
                            <?= $row['update_time'] ?>
                        </em> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg></h5>

                  

                </div>
                <h2 class="product-title fs-sm mb-2"><a href="marketplace-single.html" style="font-size:28px">
                        <hr>
                        <?= $row['bookname'] ?>
                        <hr>
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
                            <?= $row['state'] ?>
                        </span>
                    </div>
                    <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">
                        <?= $row['price'] ?><small>.00</small>
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