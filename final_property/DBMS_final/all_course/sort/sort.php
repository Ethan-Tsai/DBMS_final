<?php
              include("../../config.php");
                
                $by=$_GET["by"];
                if(!(isset($_GET["str"]))){

                if ($by == "good") {
//comment
                    $all_description = $db->query("SELECT *FROM `description` as d LEFT JOIN course_comment  as c ON d.dId=c.post_id GROUP BY d.dId ORDER BY COUNT(d.dId) DESC ");
                }else if($by=="def"){
                    $all_description = $db->query("SELECT *FROM`description` ORDER BY `upload_time`DESC");
                }else if($by=="like"){
                    $all_description = $db->query("SELECT *FROM`description` ORDER BY like_num DESC");
                }
            }
            // else{
            //     if ($by == "good") {
                    
            //                             $all_description = $db->prepare("SELECT *FROM `description` as d LEFT JOIN course_comment  as c ON d.dId=c.post_id WHERE course_name LIKE CONCAT('%', :course_name, '%') GROUP BY d.dId ORDER BY COUNT(d.dId) DESC ");
            //                         }else if($by=="def"){
            //                             $all_description = $db->prepare("SELECT *FROM`description` WHERE course_name LIKE CONCAT('%', :course_name, '%') ORDER BY `upload_time`DESC");
            //                         }else if($by=="like"){
            //                             $all_description = $db->prepare("SELECT *FROM`description` WHERE course_name LIKE CONCAT('%', :course_name, '%') ORDER BY like_num DESC");
            //                         }
            //                         $all_description->bindParam(':course_name', $str);
            //                         $all_description->setFetchMode(PDO::FETCH_OBJ);
            //                         $all_description->execute();
                    
            //                         $resultCount = $all_description->rowCount();
            // }
?>

<?php foreach ($all_description as $row) { 

    $us=$row["dId"];
    $con=$db->query("SELECT COUNT(comment_id+parent_comment_id)as com_num FROM `course_comment` INNER JOIN `description` ON post_id=dId  WHERE post_id=$us GROUP BY post_id");
                    $com_num=0;
                    foreach($con as $co){

                        $com_num=$co["com_num"];
                    
                }
                ?>


                    <div class="card" id="card">
                        <div class="caption">
                            <div id="course_name">
                                <b>
                                    <?php echo $row["course_name"]; ?>
                                </b>
   
                             <?php echo $row["course_id"]; ?>
    <!-- like and comment -->
 
<div style="	display: flex;
	flex-direction: column;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	align-content: flex-end;
    margin:10px;
    position:absolute;
    top:3px;
    right:5px;"
    >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
    <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
        </svg><?=$com_num?>
</div>
<div style="	display: flex;
	flex-direction: column;
	flex-wrap: nowrap;
	justify-content: center;
	align-items: center;
	align-content: flex-end;
    margin:10px;
    position:absolute;
    top:3px;
    right:30px;">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-heart-eyes" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z"/>
</svg><div id="like_num<?=$row["dId"]?>"><?=$row["like_num"]?></div>
</div>

<!-- like and comment -->

                            </div>

                            <div class="rating-position">
                                <div class="star-rate-item" style="display: inline-block;">Difficulty</div>
                                <div class="star-rating" style="display: inline-block;">
                                    <ul class="list-inline">
                                        <?php
                                        $difficulty = $row["difficulty"];
                                        $totalStars = 5;
                                        for ($i = 1; $i <= $totalStars; $i++) {
                                            if ($i <= $difficulty) {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="star-rate-item" style="display: inline-block;">Grading</div>
                                <div class="star-rating" style="display: inline-block;">
                                    <ul class="list-inline">
                                        <?php
                                        $difficulty = $row["sweetness"];
                                        $totalStars = 5;
                                        for ($i = 1; $i <= $totalStars; $i++) {
                                            if ($i <= $difficulty) {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="star-rate-item" style="display: inline-block;">Attendance</div>
                                <div class="star-rating" style="display: inline-block;">
                                    <ul class="list-inline">
                                        <?php
                                        $difficulty = $row["coolness"];
                                        $totalStars = 5;
                                        for ($i = 1; $i <= $totalStars; $i++) {
                                            if ($i <= $difficulty) {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <?php
                                            } else {
                                                ?>
                                                <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">"
                                <?php echo $row["content"]; ?>"
                            </div>
                        </div>

                        <!-- Like button start -->
                        
                            
                            <button type="submit" class="like-btn" id="likebtn<?=$row['dId']?>"   onclick="add_like(<?=$row['dId']?>)">LIKE</button>
                        
                        <!-- Like button end -->

                        <!-- Book detail button start-->
                        <form action="course_detail.php" method="POST">
                            <input type="hidden" name="post_id" value="<?php echo $row['dId']; ?>">
                            <button type="submit" class="read-more-btn">READ MORE</button>
                        </form>
                        <!-- Book detail button end-->

                    </div>
                <?php } ?>
                <!-- default display from database end -->
            