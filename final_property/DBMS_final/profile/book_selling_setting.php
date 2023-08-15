<?php
session_start();
if (!(isset($_SESSION["user_id"]))) {
  echo "<script>";
  echo "alert('請先登入');";
  echo "location.href='../main/login_function.php';";
  echo "</script>";
  exit();
}
include("../config.php") //connect to data base
?>

    <?php 
      $mId = $_SESSION["user_id"]; //checking whether connected or not


        $get_member_profile = $db->query("SELECT * FROM member where mId = $mId");
        $selling_record = $db->query("SELECT count(*) FROM `member` as m JOIN `book` as b WHERE m.mId ='$mId'")->fetchColumn(); 
        foreach($get_member_profile as $profile){
          $member_image = $profile["image"];
          $member_name = $profile["name"];
          $member_email = $profile["email"]; 
          $member_department = $profile["department"];
          $member_phone = $profile["phoneNumber"];
          $member_transpoint = $profile["transPoint"];
          $member_descpoint = $profile["descPoint"];
          $mId = $profile["mId"];
        }



    ?>

                <!-- sql query -->
                <?php
            $cart = $db->query("SELECT * FROM `cart_new` WHERE `user_id` = $mId");
            $cart_num = $cart->rowCount();

						if ((isset($_SESSION["user_id"]))) {

							$user = $_SESSION['user_id'];
							$sql_cart = $db->query("SELECT * FROM `cart_new` JOIN `book` ON `book_mid`= `mId` WHERE `user_id` = $user");
							$num = $sql_cart->rowCount();
							$price = $db->query("SELECT SUM(price) FROM `cart_new` INNER JOIN `book` ON book.mid = cart_new.book_mid AND book.bookname=cart_new.bookname WHERE `user_id` = $mId;");
							foreach ($price as $pri) {
								$price_final = $pri["SUM(price)"];
							}
						}
            ?>

<!DOCTYPE html>
  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <title>Book Manage</title>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="./profile.css">
  </head>


  <!-- Body-->
  <body class="handheld-toolbar-enabled">
    <!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="../external.html?link=http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>

      <!-- Page Title-->
      <div class="page-title-overlap bg-dark pt-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Book Manage</h1>
          </div>
        </div>
      </div>
      <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
          <!-- Sidebar-->
          <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
            <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
              <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
                <div class="d-md-flex align-items-center">
                  <!-- <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0" style="width: 6.375rem; height: 6.375rem"> -->
                    <img class="rounded-circle" src="<?=$member_image?>" width="100" height="100" alt="non_picture">
                  <!-- </div> -->
                  <div class="ps-md-3">
                    <h3 class="fs-base mb-0"><?php echo $member_name?></h3><span class="text-accent fs-sm"><?php echo $member_email?></span>
                  </div>
                </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="profile.php" data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
              </div>
              <div class="d-lg-block collapse" id="account-menu">
                <div class="bg-secondary px-4 py-3">
                  <h3 class="fs-sm mb-0 text-muted">Dashboard</h3>
                </div>
                <ul class="list-unstyled mb-0">
                  <li class="nav-link-style d-flex align-items-center px-4 py-3"><i class="ci-bag opacity-60 me-2"></i>Cart<span class="fs-sm text-muted ms-auto"><?=$cart_num?></span></li>
                  <li class="nav-link-style d-flex align-items-center px-4 py-3"><i class="ci-heart opacity-60 me-2"></i>Transaction Point<span class="fs-sm text-muted ms-auto"><?php echo $member_transpoint?></span></li>
                  <li class="nav-link-style d-flex align-items-center px-4 py-3"><i class="ci-help opacity-60 me-2"></i>Description Point<span class="fs-sm text-muted ms-auto"><?php echo $member_descpoint?></span></li>
                </ul>
                <div class="bg-secondary px-4 py-3">
                  <h3 class="fs-sm mb-0 text-muted">Account settings</h3>
                </div>
                <ul class="list-unstyled mb-0">
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 " href="profile.php"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="book_selling_setting.php"><i class="ci-location opacity-60 me-2"></i>Book manage</a></li>
                  
                </ul>
              </div>
            </div>
          </aside>
        

          <!-- Content  -->
          <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
                <h6 class="fs-base text-light mb-0">Here to manage your book:</h6><a class="btn btn-primary btn-sm" href="../main/logout.php"><i class="ci-sign-out me-2"></i>Log out</a>
            </div>
            <!-- Wishlist-->
            <!-- Item-->
<?php
        $get_selling_book = $db -> query("SELECT * FROM `book` as b JOIN `member` as m ON b.mid=m.mid WHERE m.mId = $mId ORDER BY `update_time`DESC");
        $num=$get_selling_book->rowCount();
if($num==0){
  ?>
<div><p>no book selling</p></div>
  <?php
}
        foreach($get_selling_book as $book){
            $book_name = $book["bookname"];
            $book_price = $book["price"];
            $book_picture = $book["picture"];
            $book_state = $book["state"];
            $book_dep = $book["dep"];
            $book_up_time = $book["update_time"];
       
?>


            <div class="d-sm-flex justify-content-between mt-lg-4 mb-4 pb-3 pb-sm-2 border-bottom">
              <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="book_detail.php" style="width: 10rem;"><img src="<?= $book_picture ?>" width="130" alt="Product"></a>
                <div class="pt-2">
                  <h3 class="product-title fs-base mb-2"><a href="../all_book/book_detail.php"><?php echo $book_name ?></a></h3>
                  <div class="fs-sm"><span class="text-muted me-2">State:</span><?php echo $book_state?></div>
                  <div class="fs-sm"><span class="text-muted me-2">Department:</span><?php echo $book_dep?></div>
                  <div class="fs-sm"><span class="text-muted me-2">Update Time</span><?php echo $book_up_time?></div>
                  <div class="fs-lg text-accent pt-2"><span class="text-muted me-2">售價:</span><?php echo $book_price?></div>
                </div>
              </div>
              <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center" style="display: flex;">

                <form action="../edit_function/edit_book.php" method="post">
                  <input type="hidden" name="bookname" value="<?=$book_name?>">
                  <input type="submit" class="btn btn-outline-danger btn-sm" type="button" value="Edit"><i class="ci-trash me-2"></i></input>
                </form>

                <form action="../dele_function/dele.php" method="post" id="">
                  <input type="hidden" name="bookname" value="<?=$book_name?>">
                  <input type="submit" class="btn btn-outline-danger btn-sm" type="button" value="Delete"><i class="ci-trash me-2"></i></input>
                </form>
              </div>
              
            </div>
          <?php
          
        }
        ?>
            

          </section>
        </div>
      </div>
    </main>
    
    <!-- Toolbar for handheld devices (Default)-->
    <div class="handheld-toolbar">
      <div class="d-table table-layout-fixed w-100"><a class="d-table-cell handheld-toolbar-item" href="account-wishlist.html"><span class="handheld-toolbar-icon"><i class="ci-heart"></i></span><span class="handheld-toolbar-label">Wishlist</span></a><a class="d-table-cell handheld-toolbar-item" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" onclick="window.scrollTo(0, 0)"><span class="handheld-toolbar-icon"><i class="ci-menu"></i></span><span class="handheld-toolbar-label">Menu</span></a><a class="d-table-cell handheld-toolbar-item" href="shop-cart.html"><span class="handheld-toolbar-icon"><i class="ci-cart"></i><span class="badge bg-primary rounded-pill ms-1">4</span></span><span class="handheld-toolbar-label">$265.00</span></a></div>
    </div>
    <!-- Back To Top Button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon ci-arrow-up">   </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>

<!-- Mirrored from cartzilla.createx.studio/account-profile.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 19 Aug 2022 21:36:31 GMT -->
</html>
