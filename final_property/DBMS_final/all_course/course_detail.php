<?php
session_start();
include("../config.php");
$post_id = $_POST["post_id"];
if (isset($_SESSION["user_id"])) {
    $user = $_SESSION["user_id"];
} else {
    $user = 45;
}
?>

<?php
$sql = $db->query("SELECT * FROM description WHERE dId = '$post_id'");
foreach ($sql as $row) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Course Review</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../jquery-3.6.4.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boltcss/bolt.min.css">
        <!-- <link rel="stylesheet" href="popup.css">   -->
        <link rel="stylesheet" href="./course_detail.css">
    </head>

    <body>
    <div style="margin-top: 800px;">
        <form id="review_form" style="margin-top: 800px;">
            <h1 style="margin-top: 30px;"><?=$row["content"]?></h1>

            <div id="review_form_course">
                <p><b>Course name: </b>
                    <?= $row["course_name"] ?>
                </p>
                <p><b>Course ID: </b>
                    <?= $row["course_id"] ?>
                </p>
            </div>


            <div class="container">
                <div>
                    <div class="star-rate-item" style="display: inline-block;"><b>Evalutaion:</b> Difficulty</div>
                    <div class="star-rating" id="star-1" style="display: inline-block;">
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
                </div>

                <div class="item">
                    <div class="star-rate-item" style="display: inline-block;">Grading</div>
                    <div class="star-rating" id="star-2" style="display: inline-block;">
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
                </div>

                <div class="item">
                    <div class="star-rate-item" style="display: inline-block;">Attendance</div>
                    <div class="star-rating" id="star-3" style="display: inline-block;">
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
            </div>

            <div>
                <div class="content"><b>Details: </b>
                    <?php echo $row["more_content"]; ?>
                </div>
            </div>

        </form>




        <?php
}
?>


                <!-- Product description-->
                <div class="container pt-lg-3 pb-4 pb-sm-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="h3 pb-2">Comment</h2>
                           
                            <div class="container">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <input type="hidden" name="comment_name" id="comment_name" class="form-control" value="<?=$user?>" />
    </div>
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="hidden" value="<?=$post_id?>" name="post_id">
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <button class="read-more-btn" id="sort">ALL</button>
									<button class="read-more-btn" id="set">Most relevent</button>
                                    <button class="read-more-btn" id="conclusion">Conclusion</button>
   <div id="display_comment"></div>
  </div>




                        </div>
                    </div>
                </div>
    </body>
    </html>

<?php
// }
?>
<!-- comment -->
<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"./add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

// filter_comment();
load_comment();


 function load_comment()
 {

  $.ajax({
   url:"./fetch_comment.php?post_id=<?=$post_id?>",
   method:"POST",

   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 function filter(){

 }




 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>

<script>
		 $(document).on('click', '#set', function(){
            document.getElementById('set').style.background= '#DCDCDC';
            document.getElementById('sort').style.background= '#ddd';
  $.ajax({
   url:"../filter/fetch_course_comment.php?post_id=<?=$post_id?>",
   method:"GET",

   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 });

 $(document).on('click', '#sort', function(){
    
    document.getElementById('sort').style.background= '#DCDCDC';
    document.getElementById('set').style.background= '#ddd';
	$.ajax({
	 url:"./fetch_comment.php?post_id=<?=$post_id?>",
	 method:"GET",
  
	 success:function(data)
	 {
	  $('#display_comment').html(data);
	 }
	})
   });

   $(document).on('click', '#conclusion', function(){
    
	$.ajax({
	 url:"../prompt/train.php?post_id=<?=$post_id?>",
	 method:"GET",
  
	 success:function(data)
	 {
	  $('#display_comment').html(data);
	 }
	})
   });
	</script>
<!-- comment -->

<style>
    /* for comment */

.panel-default {
    border-color: #ddd;
}

.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}

.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

.panel-body {
    padding: 15px;
}

.panel-footer {
    padding: 10px 15px;
    background-color: #f5f5f5;
    border-top: 1px solid #ddd;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}
</style>