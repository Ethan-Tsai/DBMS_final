<?php
session_start();
include("../config.php") //connect to data base
	?>
<?php
$book_name = $_GET["book_name"];
$mId = $_GET["mId"];
// $mId = $_SESSION["user_id"]; //checking whether connected or not


$get_member_profile = $db->query("SELECT * FROM member where `mId` = $mId");
$selling_record = $db->query("SELECT count(*) FROM `member` as m JOIN `book` as b WHERE m.mId ='$mId'")->fetchColumn();
foreach ($get_member_profile as $profile) {
	$member_image = $profile["image"];
	$member_name = $profile["name"];
	$member_email = $profile["email"];
	$member_department = $profile["department"];
	$member_phone = $profile["phoneNumber"];
	$member_transpoint = $profile["transPoint"];
	$member_descpoint = $profile["descPoint"];
	$mId = $profile["mId"];
}

$get_selling_book = $db->query("SELECT * FROM `book` as b JOIN `member` as m ON b.mid=m.mid WHERE `bookname`='$book_name'AND b.mid=$mId");
foreach ($get_selling_book as $book) {

	$book_price = $book["price"];
	$book_picture = $book["picture"];
	$book_state = $book["state"];
	$book_dep = $book["dep"];
	$book_up_time = $book["update_time"];
	$book_condition = $book["condition"];
	$book_ISBN = $book["ISBN"];
}

$comment = $db->query("SELECT * FROM tbl_comment as com
        JOIN `member` as m ON m.mId=com.comment_sender_name
        WHERE parent_comment_id = '0' AND `book_mId`=$mId AND `bookname`='$book_name'
        ORDER BY comment_id DESC");
$comment_num = $comment->rowCount();

?>
<!DOCTYPE html>
<html>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="content-type">
	<meta charset="utf-8">
	<title>Book Detail</title><!-- Main Theme Styles + Bootstrap-->
	<link href="../profile/profile.css" media="screen" rel="stylesheet">
	<script src="../jquery-3.6.4.min.js">
	</script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	</script>
	<script src="../tran_saction/to_cart.js">
	</script>
	<script src="../tran_saction/cart_item.js">
	</script>
	<link href="../tran_saction/cart.css" rel="stylesheet">
</head>
<!-- Custom page title-->

<body>
	<main>
		<div class="page-title-overlap bg-dark pt-4" id="blur">
			<div class="container d-lg-flex justify-content-between py-2 py-lg-3">
				<div class="order-lg-1 pe-lg-4 text-center text-lg-start">
					<h1 class="h3 text-light mb-2">
						<?php echo $book_name ?>
					</h1>
					<div>
						<div class="star-rating">
							<i class="star-rating-icon ci-star-filled active"></i><i
								class="star-rating-icon ci-star-filled active"></i><i
								class="star-rating-icon ci-star-filled active"></i><i
								class="star-rating-icon ci-star-filled active"></i><i
								class="star-rating-icon ci-star"></i>
						</div><span class="d-inline-block fs-sm text-white opacity-70 align-middle mt-1 ms-1">
							<?= $comment_num ?>
							Comments
						</span>
					</div>
				</div>
			</div>
		
		<div class="container">
			<div class="bg-light shadow-lg rounded-3">
				<!-- Tabs-->
				<div class="nav nav-tabs" role="tablist">
					<div class="nav-item">
						<span class="nav-link py-4 px-sm-4" data-bs-toggle="tab" href="#general" role="tab">General
							<span class='d-none d-sm-inline'>Info</span></span>
					</div>
					<!-- cart button start -->
					<div class="cart_container">
						<?php
						if ((isset($_SESSION["user_id"]))) {

							$user = $_SESSION['user_id'];
							$sql_cart = $db->query("SELECT * FROM `cart_new` as c JOIN `book` as b ON 
							`book_mid`= `mId` and c.bookname=b.bookname  WHERE `user_id` =$user");

							$num = $sql_cart->rowCount();
							$price_sum = $db->query("SELECT SUM(price) FROM `cart_new` INNER JOIN `book` ON 
							book.mid = cart_new.book_mid AND book.bookname=cart_new.bookname WHERE `user_id` = $mId"); 
							// here
							?>

							
							<div class="navbar-tool dropdown ms-3">
								<button id="add-btn" class="navbar-tool-icon-box bg-secondary dropdown-toggle">
									<!--onclick="myFunction()"-->
									<svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-tabler icon-tabler-shopping-bag" width="30" height="30"
										viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
										<path
											d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z">
										</path>
										<path d="M9 11v-5a3 3 0 0 1 6 0v5"></path>
									</svg>

									<span class="navbar-tool-label" id="cart_num">
										<?= $num ?>
									</span>

								</button>
							</div>

							<?php
						} else {
							$user = "anoymous";
						}
						?>
					</div>
					<!-- end cart try -->
					<!-- <li class="nav-item"><a class="nav-link py-4 px-sm-4" href="#reviews" data-bs-toggle="tab" role="tab">Reviews <span class="fs-sm opacity-60">(74)</span></a></li> -->
				</div>

				<div class="px-4 pt-lg-3 pb-3 mb-5">
					<div class="tab-content px-lg-3">
						<!-- General info tab-->
						<div class="tab-pane fade show active" id="general" role="tabpanel">
							<div class="row">
								<!-- Product gallery-->
								<div class="col-lg-7 pe-lg-0">
									<div class="product-gallery">
										<div class="product-gallery-preview order-sm-2">
											<div class="product-gallery-preview-item active" id="first">
												<img alt="book image" class="image-zoom"
													data-zoom="<?= $book_picture ?>" src="<?= $book_picture ?>">
												<div class="image-zoom-pane"></div>
											</div>

										</div>
									</div>
									<!-- Product details-->
									<div class="col-lg-5 pt-4 pt-lg-0">
										<div class="product-details ms-auto pb-3">
										</div>
									</div>
								</div>
								<div class="col">
									<!-- Product description-->
									<div class="container pt-lg-3 pb-4 pb-sm-5">
										<div class="h3 fw-normal text-accent mb-3 me-1">
											$
											<?php echo $book_price ?>
										</div>
										<div class="fs-sm mb-4">
											<span class="text-heading fw-medium me-1">State:</span><span
												class="text-muted" id="colorOption">
												<?php echo $book_state ?>
											</span>
										</div>
										<div class="fs-sm mb-4">
											<span class="text-heading fw-medium me-1">Department:</span><span
												class="text-muted" id="colorOption">
												<?php echo $book_dep ?>
											</span>
										</div>
										<div class="fs-sm mb-4">
											<span class="text-heading fw-medium me-1">ISBN:</span> <span
												class="text-muted" id="colorOption">
												<?php echo $book_ISBN ?>
											</span>
										</div>

										<h2 class="h3 pb-2">Condition</h2>
										<hr>
										<p>
											<?php echo $book_condition ?>
										</p>

										<!-- button -->
										<div class="d-flex align-items-center pt-2 pb-4">
											<?php
											if (!(isset($_SESSION["user_id"]))) {
												?><button class="btn btn-primary btn-shadow d-block w-100"><i
														class="ci-cart fs-lg me-2"></i>登入後即可購買</button>
												<?php
											} else {

												?> <button class="btn btn-secondary btn-shadow d-block" id="cart" style="width:130px; margin-right:15px"
													onclick="cart('<?= $book_name ?>',<?= $mId ?>)">加入購物車</button>
												<form action="../tran_saction/checkout.php" method="get">
													<input name="bookname" type="hidden" value="<?= $book_name ?>">
													<input name="mid" type="hidden" value="<?= $mId ?>">
													<!-- <input type="hidden" name="user" value="<? $_SESSION["user_id"] ?>"> -->
													<!-- <button type="submit">直接結帳</button> -->
													<button class="btn btn-info btn-shadow d-block w-100" type="submit"><i
															class="ci-cart fs-lg me-2"></i>Buy it</button>
												</form>
												<?php
											}
											?>
										</div>
										<!-- live search -->
										<div>
											<hr>
											related course:
											<div id="rela_co" style="margin-left: 2em">
                      <ul>
												
													<?php
													$sql = $db->query("SELECT * FROM book_course  WHERE `bookname`='$book_name' AND `book_mid`=$mId");
													?>
                          
                          <?php
                          foreach ($sql as $row) {
														?>
                            <form action="../all_course/Home.php" method="post">
														
															<li style="color:#fe696a;"><input name="submit" type="hidden" value="submit"> 
                              <input type="hidden" value="<?=$row["course_name"]?>"name="search"> <button
																	style=" border: none; margin: 0; padding: 0; width: auto; overflow: visible; background: transparent;color:#fe696a;"
																	type="submit">
																	<?= $row["course_name"] ?>
																</button></li>
                                </form>
															<?php
													}
													?>
													
                        </ul>
											</div>
											<hr>
											<style>
												#livesearch a:hover {
													background-color: antiquewhite;
												}
											</style>
											<form>
												<label for="related_course">新增相關課程</label> <input id="related_course"
													onkeyup="showResult(this.value)" size="30" type="text">
												<div id="livesearch"></div>
											</form>
										</div>
										<!-- live search -->
									</div>
								</div>
							</div>
						</div><!-- Product panels-->
						<div class="accordion mb-4" id="productPanels">
							<div class="accordion-item">
								<div class="accordion-collapse collapse show" data-bs-parent="#productPanels"
									id="shippingOptions">
									<div class="accordion-body fs-sm">
										<div class="d-flex justify-content-between border-bottom pb-2">
											<div>
												<a href="../profile/profile.php?open=1&mId=<?=$mId?>">
													<div class="d-md-flex align-items-center">
														<img alt="non_picture" class="rounded-circle" height="80"
															src="<?= $member_image ?>" width="80">
														<div class="ps-md-3">
															<h2 class="fs-base mb-0"><strong>Seller Info</strong></h2>
															<h3 class="fs-base mb-0">Name:
																<?php echo $member_name ?>
															</h3><span class="text-accent fs-sm">Email:
																<?php echo $member_email ?>
															</span>
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Product description-->
					<div class="container pt-lg-3 pb-4 pb-sm-5">
						<div class="row justify-content-center" style="display: flex; justify-content: center;">
							<div class="col-lg-8">
								<div>
									<h2 class="h3 pb-2" style="padding-left:35px;">Comment</h2>
									<button class="read-more-btn" id="sort">ALL</button>
									<button class="read-more-btn" id="set">Most relevent</button>
								</div>
								<div class="container">
									<form id="comment_form" method="post" name="comment_form">
										<div class="form-group">
											<input class="form-control" id="comment_name" name="comment_name"
												type="hidden" value="<?= $user ?>">
										</div>
										<div class="form-group">
											<textarea class="form-control" id="comment_content" name="comment_content"
												placeholder="Enter Comment" rows="5"></textarea>
										</div>
										<div class="form-group">
											<input name="mId" type="hidden" value="<?= $mId ?>"> 
											<input name="bookname"type="hidden" value="<?= $book_name ?>"> 
											<input id="comment_id"name="comment_id" type="hidden" value="0"> 
											<input class="btn btn-info"id="submit" name="submit" type="submit" value="Submit">
										</div>
									</form><span id="comment_message"></span><br>
									<div id="display_comment"></div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		</div>
		<!-- form -->
		<div>
			<form action="../tran_saction/checkout.php" method="post" id="add_form">
				<div class="popup" id="popup">
					<div class="close-btn">&times;</div>
        
					<h2>Cart Item:</h2>
          <div id="load_cart">
					<?php
					foreach ($sql_cart as $row_cart) { ?>
						<div class="d-flex align-items-center" style="margin-bottom:15px"><a class="d-block flex-shrink-0" href="">
              <img src="<?= $row_cart["picture"]?>" width="64" alt="Product"></a>
                            <div class="ps-2">
								<h6 class="widget-product-title"><a href=""><?= $row_cart["bookname"] ?></a></h6>
								<div class="widget-product-meta"><span class="text-accent me-2">$<?= $row_cart["price"] ?></span></div>
								<span class="text-muted"><?= $row_cart["state"]?></span>
                            </div>
                        </div>
						<?php
					}
					?>
					<button class="read-more-btn" style="margin-top:15px">BUY</button>
          </div>
				</div>
			</form>
			<!-- </div> -->

			<script type="text/javascript">
				function toggle() {
					var blur = document.getElementById('blur');
					blur.classList.toggle('active');
					var popup = document.getElementById('popup');
					popup.classList.toggle('active');
				}

				var addBtn = document.getElementById('add-btn');
				addBtn.addEventListener('click', toggle);
				var closeBtn = document.querySelector('.close-btn');
				closeBtn.addEventListener('click', toggle);    
			</script>
		</div>
		<!-- end form -->
		
	</main>

	<!-- Mirrored from cartzilla.createx.studio/account-profile.html by HTTrack Website Copier/3.x [XR&CO'2017], Fri, 19 Aug 2022 21:36:31 GMT -->
	<!-- comment -->
	<script>
		$(document).ready(function () {

			$('#comment_form').on('submit', function (event) {
				event.preventDefault();
				var form_data = $(this).serialize();
				$.ajax({
					url: "../comment/add_comment.php",
					method: "POST",
					data: form_data,
					dataType: "JSON",
					success: function (data) {
						if (data.error != '') {
							$('#comment_form')[0].reset();
							$('#comment_message').html(data.error);
							$('#comment_id').val('0');
							load_comment();
						}
					}
				})
			});

			load_comment();

			function load_comment() {
				var mId = <?= $mId ?>;
				var book = "'<?= $book_name ?>'";
				$.ajax({
					url: "../comment/fetch_comment.php?bookname=<?= $book_name ?>&mId=<?= $mId ?>",
					method: "POST",

					success: function (data) {
						$('#display_comment').html(data);
					}
				})
			}
			

			$(document).on('click', '.reply', function () {
				var comment_id = $(this).attr("id");
				$('#comment_id').val(comment_id);
				$('#comment_name').focus();
			});

			

		});
	</script> <!-- comment -->

	<script>
		function showResult(str) {
			if (str.length == 0) {
				document.getElementById("livesearch").innerHTML = "";
				document.getElementById("livesearch").style.border = "0px";
				return;
			}
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("livesearch").innerHTML = this.responseText;
					document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
				}
			}
			xmlhttp.open("GET", "./related_course/livesearch.php?q=" + str, true);
			xmlhttp.send();

		}
	</script>

	<script>
		function rela_cou(a) {
			// alert("a");
			//     const node = document.createElement("li");
			// const textnode = document.createTextNode(a);

			// node.appendChild(textnode);
			// document.getElementById("rela_co").appendChild(node);
			// document.getElementById("rela_co").style.color="#fe696a";

			book_name = "<?=$book_name?>";
			mId = <?= $mId ?>;
			$.get("./related_course/result.php", { str: a, book_name: book_name, mId: mId }, function (data) {
				$("#rela_co").html(data);
			});
		}


	</script>

	<script>
		 $(document).on('click', '#set', function(){
    
  $.ajax({
   url:"../filter/fetch_book_comment.php?bookname=<?=$book_name?>&mId=<?=$mId?>",
   method:"GET",

   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 });

 $(document).on('click', '#sort', function(){
    
	$.ajax({
	 url:"../comment/fetch_comment.php?bookname=<?= $book_name ?>&mId=<?= $mId ?>",
	 method:"GET",
  
	 success:function(data)
	 {
	  $('#display_comment').html(data);
	 }
	})
   });
	</script>
	<a href="./Home.php" style="color:aliceblue;
	margin-left:40%;
	margin-right:40%;display:flex">繼續找書~</a>
</body>

</html>