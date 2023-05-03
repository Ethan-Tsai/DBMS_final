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
    }
    ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-orders.html"><i class="ci-bag opacity-60 me-2"></i>Transaction Point<span class="fs-sm text-muted ms-auto"><?php echo $account_transPoint?></span></a></li>
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-wishlist.html"><i class="ci-heart opacity-60 me-2"></i>Description Point<span class="fs-sm text-muted ms-auto"><?php echo $account_descPoint?></span></a></li>
                  <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-tickets.html"><i class="ci-help opacity-60 me-2"></i>Orders<span class="fs-sm text-muted ms-auto">1</span></a></li>
                </ul>
                <div class="bg-secondary px-4 py-3">
                  <h3 class="fs-sm mb-0 text-muted">Settings</h3>
                </div>
                <ul class="list-unstyled mb-0">
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3 active" href="account-profile.html"><i class="ci-user opacity-60 me-2"></i>Profile info</a></li>
                  <li class="border-bottom mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-address.html"><i class="ci-location opacity-60 me-2"></i>Books selling setting</a></li>
                  <!-- <li class="mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-payment.html"><i class="ci-card opacity-60 me-2"></i></a></li> --> <!--course setting -->
                  <!-- <li class="d-lg-none border-top mb-0"><a class="nav-link-style d-flex align-items-center px-4 py-3" href="account-signin.html"><i class="ci-sign-out opacity-60 me-2"></i>Sign out</a></li> -->
                </ul>
              </div>
            </div>
    </aside>

    <!-- Profile form-->
            <form>
              <div class="bg-secondary rounded-3 p-4 mb-4">
                <div class="d-flex align-items-center"><img class="rounded" src="<?php $member_image ?>" width="90" alt="Susan Gardner">
                  <div class="ps-3">
                    <form action = "" method = "POST">
                        <button class="btn btn-light btn-shadow btn-sm mb-2" type="submit" name = "submit"><i class="ci-loading me-2"></i>Change photo</button> <!-- connect to db latter -->
                    <div class="p mb-0 fs-ms text-muted">Upload JPG, GIF or PNG image.</div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="row gx-4 gy-3">
                <div class="col-sm-6">
                  <label class="form-label" for="account-fn">Name</label>
                  <input class="form-control" type="text" id="account-fn" value="<?php echo $member_name?>">
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-ln">Department</label>
                  <input class="form-control" type="text" id="account-ln" value="<?php echo $member_department?>">
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-email">Email Address</label>
                  <input class="form-control" type="email" id="account-email" value="<?php echo $member_email?>" disabled>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-phone">Phone Number</label>
                  <input class="form-control" type="text" id="account-phone" value="<?php echo $member_phone?>" required>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-pass">New Password</label>
                  <div class="password-toggle">
                    <input class="form-control" type="password" id="account-pass">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span> <!--connect to db-->
                    </label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <label class="form-label" for="account-confirm-pass">Confirm Password</label>
                  <div class="password-toggle">
                    <input class="form-control" type="password" id="account-confirm-pass">
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <hr class="mt-2 mb-3">
                  <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <!-- <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="subscribe_me" checked>
                      <label class="form-check-label" for="subscribe_me">Subscribe me to Newsletter</label>
                    </div> -->
                    <button class="btn btn-primary mt-3 mt-sm-0" type="button">Update profile</button> <!--change info in db -->
                  </div>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </main>

    <header>
        <div class="container">
            <div class="profile">
                <div class="profile-image">
                    <img src="<?=$member_image?>" alt="" width="300px">
                </div>
                <div class="profile-user-settings">
                    <h1 class="profile-user-name"><?php echo  $member_name;?></h1>
                    <button class="btn profile-edit-btn">Edit Profile</button>
                    <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>
                </div>
                <div class="profile-stats">
                    <ul>
                        <li><span class="profile-stat-count"><?php echo $selling_record; ?></span> selling record</li>
                        <li><span class="profile-stat-count"><?php echo $profile['phoneNumber']; ?></span> phone number</li>
                        <li><span class="profile-stat-count"><?php echo $profile['department']; ?></span> department</li>
                    </ul>
                </div>
                <!-- <div class="profile-bio">
                    <p><span class="profile-real-name">Jane Doe</span> Lorem ipsum dolor sit, amet consectetur adipisicing elit 📷✈️🏕️</p>
                </div> -->
            </div>
            <!-- End of profile section -->
        </div>
        <!-- End of container -->
    </header>

            <?php 
                $sql = "SELECT * FROM `book` JOIN `member` WHERE `mId`='$mId'  ORDER BY `uploaded_time` DESC";
                $member_posts = $db->query($sql);                
            ?>

        <div class="container">
            <div class="gallery">
            <?php
                foreach($user_posts as $user_post){
                        $user_images = $user_post["image_file_name"];
                        $post_id = $user_post["id"];
            ?>     
                <div class="gallery-item" tabindex="0">
                       
                    <a href="edit.php?post_id=<?=$post_id;?>">
                        <img src="<?php echo $user_images;?>" class="gallery-image" alt="">
                        <div class="gallery-item-info">
                            <ul>
                                <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 56</li>
                                <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 2</li>
                            </ul>
                        </div>
                    </a>
                </div>
            <?php
                
                }   
            ?>
            </div>
        </div>
    
</body>
</html>