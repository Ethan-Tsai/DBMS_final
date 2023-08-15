<?php
$dep=$_POST["dep"];
$bookname=$_POST["bookname"];

$sql = $db->query("SELECT *FROM`book` WHERE `dep`='$dep' or `bookname` LIKE '%$bookname%' ORDER BY `update_time`DESC");
foreach ($sql as $row) {
    ?>


      
                    <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4">
                      <div class="card product-card card-static">
                        <button class="btn-wishlist btn-sm" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Add to wishlist" aria-label="Add to wishlist"><i class="ci-heart"></i></button><a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img src="<?=$row["picture"]?>" alt="Product" width="300px"></a>
                        <div class="card-body py-2"><a class="product-meta d-block fs-xs pb-1" href="#"><?=$row["dep"]?></a>
                          <h3 class="product-title fs-sm"><a href="shop-single-v1.html"><?=$row["bookname"]?></a></h3>
                          <div class="d-flex justify-content-between">
                            <div class="product-price"><span class="text-accent"><?=$row["price"]?><small>.99</small></span></div>
                            <div class="star-rating"><i class="star-rating-icon bi bi-star-fill"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-half active"></i><i class="star-rating-icon ci-star"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    

        <?php
}
    ?>