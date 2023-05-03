<?php
include("../config.php") //connect to data base
?>

<!DOCTYPE html>

    <?php 
      $mId = $_SESSION["mId"];

      if(isset($mId)){

        $sql = "SELECT * FROM `memeber` WHERE `email`='$email'";
        $get_user_profile = $db->query($sql);
        $nRows = $db->query("SELECT count(*) FROM `member` JOIN `book` WHERE `mId`='$mId'")->fetchColumn(); 
        foreach($get_member_profile as $profile){
            $member_image = $profile["member_picture"];
            $member_name = $profile["member_name"]; 
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
            <?php 
                $sql = "SELECT * FROM `book` JOIN `member` WHERE `mId`='$mId'  ORDER BY `uploaded_time` DESC";
                $member_post = $db->query($sql);                
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