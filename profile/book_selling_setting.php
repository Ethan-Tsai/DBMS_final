<?php
include("../config.php") //connect to data base
?>

<!DOCTYPE html>

    <?php 
      $mId = $_SESSION["mId"]; //checking whether connected or not

      if(isset($mId)){

        $sql = "SELECT * FROM `memeber` WHERE `email`='$email'";
        $get_member_profile = $db->query($sql);
        $selling_record = $db->query("SELECT count(*) FROM `member` JOIN `book` WHERE `mId`='$mId'")->fetchColumn(); 
        foreach($get_member_profile as $profile){
            $member_image = $profile["picture"];
            $member_name = $profile["name"];
            $member_email = $profile["email"]; 
            $member_department = $profile["department"];
            $member_phone = $profile["phoneNumber"];
        }

        $get_account_point = $db -> query("SELECT * FROM `account` WHERE `mId` = `$mId`");
        foreach($get_account_point as $point){
            $account_transPoint = $point["transPoint"];
            $account_descPoint = $point["descPoint"];
        }

        $get_selling_book = $db -> query("SELECT * FROM `book` JOIN `member` WHERE mId = $mId");
        foreach($get_selling_book as $book){
            $book_name = $book["bookname"];
            $book_price = $book["price"];
            $book_picture = $book["picture"];
        }
    }
    ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="./profile.css">

    <title>member profile</title>

</head>


<body>

    <!-- Sidebar-->
    <aside class="col-lg-4 pt-4 pt-lg-0 pe-xl-5">
            <div class="bg-white rounded-3 shadow-lg pt-1 mb-5 mb-lg-0">
              <div class="d-md-flex justify-content-between align-items-center text-center text-md-start p-4">
                <div class="d-md-flex align-items-center">
                  <!-- <div class="img-thumbnail rounded-circle position-relative flex-shrink-0 mx-auto mb-2 mx-md-0 mb-md-0" style="width: 6.375rem;"><span class="badge bg-warning position-absolute end-0 mt-n2" data-bs-toggle="tooltip" title="Reward points">384</span><img class="rounded-circle" src="img/shop/account/avatar.jpg" alt="Susan Gardner"></div> -->
                  <div class="ps-md-3">
                    <h3 class="fs-base mb-0"><?php echo $member_name; ?></h3><span class="text-accent fs-sm"><?php echo $member_email; ?></span>
                  </div>
                </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
              </div>
              <div class="d-lg-block collapse" id="account-menu">
                <div class="bg-secondary px-4 py-3">
                  <h3 class="fs-sm mb-0 text-muted">Dashboard</h3>
                </div>
                <ul class="list-unstyled mb-0">
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" ><i class="ci-bag opacity-60 me-2"></i>Transaction Point<span class="fs-sm text-muted ms-auto"><?php echo $account_transPoint?></span></a></li>
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" ><i class="ci-heart opacity-60 me-2"></i>Description Point<span class="fs-sm text-muted ms-auto"><?php echo $account_descPoint?></span></a></li>
                  <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="order.php"><i class="ci-help opacity-60 me-2"></i>Orders<span class="fs-sm text-muted ms-auto">1</span></a></li> 之後要用 -->
                </ul>
                <div class="bg-secondary px-4 py-3">
                  <h3 class="fs-sm mb-0 text-muted">Settings</h3>
                </div>
                <ul class="list-unstyled mb-0">
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="profile.php"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="book_selling_setting.php"><i class="ci-location opacity-60 me-2"></i>Books selling setting</a></li>
                  <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-payment.html"><i class="ci-card opacity-60 me-2"></i></a></li> --> <!--course setting -->
                  <!-- <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-signin.html"><i class="ci-sign-out opacity-60 me-2"></i>Sign out</a></li> -->
                </ul>
              </div>
            </div>
    </aside>
    

    <div class="widget-cart-item py-2 border-bottom">
        <button class="btn-close text-danger" type="button" aria-label="Remove" harf = "../dele_function/dele.php"><span aria-hidden="true">&times;</span></button>
        <br>
        <button class="btn-close text-danger" type="button" aria-label="Edit" harf = "../edit_function/edit.php"><span aria-hidden="true">&times;</span></button>
            <div class="d-flex align-items-center"><a class="flex-shrink-0" href="shop-single-v1.html"><img src="<?php echo $book_picture; ?>" width="64" alt="Product"></a>
                    <div class="ps-2">
                        <h6 class="widget-product-title"><a href="particular_book"><?php echo $book_name; ?></a></h6>
                        <div class="widget-product-meta"><span class="text-accent me-2"><?php echo $book_price; ?></span></div>
                    </div>
            </div>
    </div>    
    <!-- put the construct of book browse surface -->

    <script src="profile.js"></script>
</body>
</html>