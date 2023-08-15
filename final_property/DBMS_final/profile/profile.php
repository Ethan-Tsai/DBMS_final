<?php
session_start();
// if (!(isset($_SESSION["user_id"]))) {
//   echo "<script>";
//   echo "alert('請先登入');";
//   echo "location.href='../main/login_function.php';";
//   echo "</script>";
//   exit();
// }
include("../config.php") //connect to data base
?>

<?php 
if(isset($_GET["open"])){
  $open=1;
  $mId=$_GET["mId"];
}else{
$open=0;

    $mId = $_SESSION["user_id"];//checking whether connected or not
}
        // $get_member_profile = $db->query("SELECT *FROM`book` as b JOIN `member` as m ON b.mid = m.mid WHERE m.mid=$mId ORDER BY `update_time`DESC");
        $get_member_profile = $db->query("SELECT * FROM member where mId = $mId");
        $selling_record = $db->query("SELECT count(*) FROM `member` as m JOIN `book` as b WHERE m.mid='$mId'")->fetchColumn();
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


<!DOCTYPE html>
  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <title>Profile info</title>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="./profile.css">
    <script src="../jquery-3.6.4.min.js"></script>
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
            <h1 class="h3 text-light mb-0">Profile info</h1>
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
                </div><a class="btn btn-primary d-lg-none mb-2 mt-3 mt-md-0" href="#account-menu" data-bs-toggle="collapse" aria-expanded="false"><i class="ci-menu me-2"></i>Account menu</a>
              </div>
              <div class="d-lg-block collapse" id="account-menu">
                <div class="bg-secondary px-4 py-3">
                  <h3 class="fs-sm mb-0 text-muted">Dashboard</h3>
                </div>
                <ul class="list-unstyled mb-0">
                  <?php
  $cart = $db->query("SELECT * FROM `cart_new` WHERE `user_id` = $mId");
  $num = $cart->rowCount();
                  ?>
                  <li class="nav-link-style d-flex align-items-center px-4 py-3"><i class="ci-bag opacity-60 me-2"></i>Cart<span class="fs-sm text-muted ms-auto"><?=$num?></span></li>
                  <li class="nav-link-style d-flex align-items-center px-4 py-3"><i class="ci-heart opacity-60 me-2"></i>Transaction Point<span class="fs-sm text-muted ms-auto"><?php echo $member_transpoint?></span></li>
                  <li class="nav-link-style d-flex align-items-center px-4 py-3"><i class="ci-help opacity-60 me-2"></i>Description Point<span class="fs-sm text-muted ms-auto"><?php echo $member_descpoint?></span></li>
                </ul>
                <div class="bg-secondary px-4 py-3">
                  <h3 class="fs-sm mb-0 text-muted">Account settings</h3>
                </div>
                <ul class="list-unstyled mb-0">
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="profile.php"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
                  <?php
                  if($open!=1){
                    ?>
                    <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="book_selling_setting.php"><i class="ci-location opacity-60 me-2"></i>Book manage</a></li>
                  <?php
                  }?>
                </ul>
              </div>
            </div>
          </aside>

          <!-- Content  -->
          <?php
          if($open!=1){

          ?>
          <section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
              <h6 class="fs-base text-light mb-0">Update you profile details below:</h6><a class="btn btn-primary btn-sm" href="../main/logout.php"><i class="ci-sign-out me-2"></i>Log out</a>
            </div>
            <!-- Profile form-->
            <form action="profile_action.php" method="post" enctype="multipart/form-data">
              <div class="bg-secondary rounded-3 p-4 mb-4">
                <div class="d-flex align-items-center">
                  <img id="preview_progressbarTW_img" class="rounded" src="<?=$member_image?>" width="90" alt="non picture">
                  <div class="ps-3">
                  <!-- <label for="progressbarTW_img">Change avatar</label> -->
<input name="progressbarTW_img" type="file" id="imgInp" accept="image/gif, image/jpeg, image/png"/ >


                    <!-- <label for="cover_pic">Change avatar</label>
                    <input type="file" name="cover_pic" id="cover_pic"> -->
                    <!-- <input type="submit" for="cover_pic" class="btn btn-light btn-shadow btn-sm mb-2" value= "Change avatar">                     -->
                    <!-- <div class="p mb-0 fs-ms text-muted">Upload JPG, GIF or PNG image.</div> -->
                  </div>
                </div>
              </div>

              <div class="row gx-4 gy-3">
                <div class="col-sm-6">
                  <label class="form-label" for="account-fn">Your Name</label>
                  <input class="form-control" type="text" id="account-fn" name = "name" value= "<?php echo $member_name ?>">
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-ln">Department</label>
                  <input class="form-control" type="text" id="account-ln" name = "department" value= "<?php echo $member_department ?>">  <!--use option method-->
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-email">Email Address</label>
                  <input class="form-control" type="email" id="account-email" name = "email" value= "<?php echo $member_email ?>" disabled>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-phone">Phone Number</label>
                  <input class="form-control" type="text" id="account-phone" name = "phone" value= "<?php echo $member_phone ?>" required>
                </div>
                <!-- <div class="col-sm-6">
                  <label class="form-label" for="account-pass">New Password</label>
                  <div class="password-toggle">
                    <input class="form-control" type="password" id="account-pass" name = "password">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-confirm-pass">Confirm Password</label>
                  <div class="password-toggle">
                    <input class="form-control" type="password" id="account-confirm-pass" name = "confirm_password">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                </div> -->
                <div class="col-12">
                  <hr class="mt-2 mb-3">
                  <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label" for="subscribe_me"></label>
                    </div>
                    <input type="hidden" value="<?=$mId ?>" name="mId">
                    <button class="btn btn-primary mt-3 mt-sm-0" type="submit">Update profile</button>
                  </div>
                </div>
              </div>
            </form>

            <script>
  window.onload=function(){

     $("#imgInp").change(function(){
      //當檔案改變後，做一些事 
     readURL(this);   // this代表<input id="imgInp">
    //  alert("aa");
   });
   function readURL(input){
  if(input.files && input.files[0]){
    var reader = new FileReader();
    reader.onload = function (e) {
       $("#preview_progressbarTW_img").attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
}
</script>

          </section>
          <?php
          }else{
            ?>
<section class="col-lg-8">
            <!-- Toolbar-->
            <div class="d-none d-lg-flex justify-content-between align-items-center pt-lg-3 pb-4 pb-lg-5 mb-lg-3">
              <h1 style="color:aliceblue;">賣家資訊:</h1>
            </div>
            <!-- Profile form-->
            <form action="profile_action.php" method="post" enctype="multipart/form-data">
              <div class="bg-secondary rounded-3 p-4 mb-4">
   
              </div>

              <div class="row gx-4 gy-3">
                <div class="col-sm-6">
                  <label class="form-label" for="account-fn">Name</label>
                  <input class="form-control" type="text" id="account-fn" name = "name" value= "<?php echo $member_name ?>" disabled>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-ln">Department</label>
                  <input class="form-control" type="text" id="account-ln" name = "department" value= "<?php echo $member_department ?>" disabled>  <!--use option method-->
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-email">Email Address</label>
                  <input class="form-control" type="email" id="account-email" name = "email" value= "<?php echo $member_email ?>" disabled>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-phone">Phone Number</label>
                  <input class="form-control" type="text" id="account-phone" name = "phone" value= "<?php echo $member_phone ?>" disabled>
                </div>

              </div>
            </form>



          </section>
            <?php
          }
?>



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