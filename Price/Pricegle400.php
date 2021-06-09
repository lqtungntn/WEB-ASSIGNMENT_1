<?php
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	$ppid = $_SESSION['pid'] = "13";
	$listcmt = array();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mercedes";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn,"utf8");
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM comment WHERE ProductId=$ppid";
    $result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$uidtmp = $row["UserID"];
			$sqltmp = "SELECT * FROM user WHERE ID=$uidtmp";
			$resulttmp = $conn->query($sqltmp);
			$rowtmp = $resulttmp->fetch_assoc();

			$obj = array();
			$obj[0] = $row["AtTime"];
			$obj[1] = $row["Content"];
			$obj[2] = $rowtmp["Fullname"];
			array_push($listcmt, $obj);
		}
	}
	$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Price</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../image/logo.png" />
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" type="text/css" href="./Price.css">
</head>
<body>
<img id="fixed-background" src="./image_price/bg_price.png" alt="fixed-image">
	<div id="nav" class="sticky-nav">
		<nav class="navbar navbar-expand-lg ">
		  <div class="container">
			<a class="navbar-brand" href="../Home/Home.php">
			  Mercedes
			</a>
			<div class="dropdown">
			  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fa fa-bars"></i>
			  </button>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" aria-current="page" href="../Home/Home.php">Trang chủ</a>
				<a class="dropdown-item" aria-current="page" href="../Introduce/Introduce.php">Giới thiệu</a>
				<a class="dropdown-item" aria-current="page" href="../Product/Products.php">Sản phẩm</a>
				<a class="dropdown-item" aria-current="page" href="../Price/Pricea200.php">Bảng giá</a>
				<a href="../Contact/Contacts.php" class="dropdown-item" aria-current="page">Liên hệ</a>
				<a class="dropdown-item" href="../account/index.php" class="nav-link" aria-current="page">
                  <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) echo $_SESSION['name'];
                        else echo "Đăng nhập"; ?>
                </a>
			  </div>
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			  <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
				<li class="nav-item">
				  <a class="nav-link" aria-current="page" href="../Home/Home.php">Trang chủ</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" aria-current="page" href="../Introduce/Introduce.php">Giới thiệu</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" aria-current="page" href="../Product/Products.php">Sản phẩm</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link active" aria-current="page" href="../Price/Pricea200.php">Bảng giá</a>
				</li>
				<li class="nav-item">
				  <a href="../Contact/Contacts.php" class="nav-link" aria-current="page">Liên hệ</a>
				</li>
			  </ul>
			</div>
			<a href="../account/index.php" class="nav-link" aria-current="page">
                  <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) echo $_SESSION['name'];
                        else echo "Đăng nhập"; ?>
                </a>
			<div class="logo"><img class="logo" src="../image/logo.png" alt=""></div>
		  </div>
		</nav>
	  </div>
   
<!--Price-->
<div class="price">
	<div class="dropdown-2">
		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		  <i class="fa fa-bars"></i>
		</button>
		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		  <a class="dropdown-item" aria-current="page" href="../Home/Home.php">Trang chủ</a>
		  <a class="dropdown-item" aria-current="page" href="../Price/Pricea200.php">A 200</a>
		  <a class="dropdown-item" aria-current="page" href="../Price/Pricea250.php">A 250</a>
		  <a class="dropdown-item" aria-current="page" href="../Price/Pricec200.php">C 200</a>
			<a class="dropdown-item" aria-current="page" href="../Price/Pricec250.php">C 250</a>
			<a class="dropdown-item" aria-current="page" href="../Price/Pricec300.php">C 300</a>
			<a class="dropdown-item" aria-current="page" href="../Price/Pricee200.php">E 200</a>
					<a class="dropdown-item" aria-current="page" href="../Price/Pricee250.php">E 250</a>
					<a class="dropdown-item" aria-current="page" href="../Price/Pricee300.php">E 300</a>
					<a class="dropdown-item" aria-current="page" href="../Price/Priceg65.php">G 65</a>
					<a class="dropdown-item" aria-current="page" href="../Price/Priceglc200.php">GLC 200</a>
					<a class="dropdown-item" aria-current="page" href="../Price/Priceglc300coupe.php">GLC coupe</a>
					<a class="dropdown-item" aria-current="page" href="../Price/Priceglc300matic.php">GLC 4matic</a>
					<a class="dropdown-item" aria-current="page" href="../Price/Pricegle400.php">GLE 400</a>
					<a class="dropdown-item" aria-current="page" href="../Price/Pricegle450.php">GLE 450</a>

		</div>
	  </div>
	<div id="menu">
		<ul>
			<li>
				<a href="#">A-CLASS</a>
				<ul class="sub-menu">
					<li><a href="../Price/Pricea200.php">A 200</a></li>
					<li><a href="../Price/Pricea250.php">A 250</a></li>
				</ul>
			</li>
			<li>
				<a href="#">C-CLASS</a>
				<ul class="sub-menu">
					<li><a href="../Price/Pricec200.php">C 200</a></li>
					<li><a href="../Price/Pricec250.php">C 250</a></li>
					<li><a href="../Price/Pricec300.php">C 300</a></li>
				</ul>
			</li>
			<li>
				<a href="#">E-CLASS</a>
				<ul class="sub-menu">
					<li><a href="../Price/Pricee200.php">E 200</a></li>
					<li><a href="../Price/Pricee250.php">E 250</a></li>
					<li><a href="../Price/Pricee300.php">E 300</a></li>
				</ul>
			</li>
			<li>
				<a href="#">G-CLASS</a>
				<ul class="sub-menu">
					<li><a href="../Price/Priceg65.php">G 65</a></li>
				</ul>
			</li>
			<li>
				<a href="#">GLC-CLASS</a>
				<ul class="sub-menu">
					<li><a href="../Price/Priceglc200.php">GLC 200</a></li>
					<li><a href="../Price/Priceglc300coupe.php">GLC coupe</a></li>
					<li><a href="../Price/Priceglc300matic.php">GLC 4matic</a></li>
				</ul>
			</li>
			<li>
				<a href="#">GLE-CLASS</a>
				<ul class="sub-menu">
					<li><a href="../Price/Pricegle400.php">GLE 400</a></li>
					<li><a href="../Price/Pricegle450.php">GLE 450</a></li>
					
				</ul>
			</li>
			<li>
				<a href="#">MAYBACH</a>
				<ul class="sub-menu">
					<li><a href="../Price/Pricemb450.php">MB 450</a></li>
					<li><a href="../Price/Pricemb450matic.php">MB 450 4matic</a></li>
					<li><a href="../Price/Pricemb560.php">MB 560 4matic</a></li>
				</ul>
			</li>
			<li>
				<a href="#">S-CLASS</a>
				<ul class="sub-menu">
					<li><a href="../Price/Prices450.php">S 450</a></li>
					<li><a href="../Price/Prices500cabriolet.php">S 500 cabriolet</a></li>
					<li><a href="../Price/Prices500coupe.php">S 500 coupe</a></li>
				</ul>
			</li>
			<li>
				<a href="#">V-CLASS</a>
				<ul class="sub-menu">
					<li><a href="../Price/Pricev250.php">V 250</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<div class="vd">
	<!--GLE400-->
		<div class="content">
			<div class="cover">
				<h2><strong>Tổng quan về Mercedes-Benz <span>GLE 400 4MATIC</span></strong></h2>
				<p>Đặc tính thể thao được khai thác theo phong cách tuyệt vời. Trải nghiệm chiếc xe tuyệt nhất của thế giới ô tô thế hệ mới, với hình dáng hấp dẫn: sự sang trọng hiện đại của chiếc Mercedes-Benz GLE 400 4MATIC. Vóc dáng của GLE. Sự nhanh nhạy và thanh lịch của một chiếc 4MATIC. Xe GLE 400 4MATIC thế hệ mới là chiếc xe tốt nhất trên mọi địa hình.
				</p>
			</div>
			<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="8"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="9"></li>
			  </ol>
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="./image_price/gle400_out1.jpg" class="d-block w-100" alt="">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Khi nhìn phần đầu xe, chiếc Mercedes GLE 400 Coupe này trông rất khỏe khắn và đậm chất thể thao.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/gle400_out2.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Đồng thời với đó là phần lưới tản nhiệt gồm 1 thanh nan crom kép nằm ngang và logo ngôi sao 3 cánh to bản ở giữa.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/gle400_out3.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Mâm xe 20 inch với thiết kế 5 chấu kép</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/gle400_out4.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Chiều dài của chiếc GLE 400 này là 4,9 mét, rộng 2,2 mét và cao 1,7 mét.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/gle400_out5.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Bộ đèn Full LED được thiết kế sợi quang học, phía bên trên được trang trí với một đường crom chạy ngang liền, chạy từ đèn bên này sang đèn bên kia tạo nên điểm nhấn đặc biệt cho xe.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/gle400_out6.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Khoang hành lý phía dưới ca pô sau khá rộng rãi với dung tích lên tới 650 lít. Nếu gập dãy ghế ngồi phía sau xuống thì thể tích của cốp xe sẽ lên tới 1720 lít.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/gle400_in1.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>Một trong những điểm sang trọng nổi bật là tùy chọn ion hóa cho không gian nội thất. Những tính năng này có tác động tích cực và cải thiện chất lượng không khí bên trong xe.</p>
					</div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/gle400_in2.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>Vô lăng thể thao bọc da đa chức năng có đục lỗ trong vùng đuôi, móc cài bằng crom mạ bạc, và 12 nút đa chức năng</p>
					</div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/gle400_in3.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>Cửa sổ trời toàn cảnh có thể kéo đóng thuận tiện và có tấm che nắng hoạt động bằng điện (tùy chọn)</p>
					</div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/gle400_in4.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>Màn hình TFT tích hợp không có khung dành đem đến đồ họa màu sắc tuyệt hảo theo định dạng lớn hơn. Kích thước màn hình 20.3 cm và lớn hơn màn hình tiêu chuẩn là 2.5 cm.</p>
					</div>
				</div>
				
			  </div>
			  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
			<div class="os">
				<h2><strong>Vận hành</strong></h2>
				<p><b>Động cơ V 6 xi-lanh</b><br>
Khi thiết kế động cơ này, chúng tôi chú trọng tới tầm quan trọng đặc biệt giúp chiếc xe nhỏ gọn và nhẹ hơn. Kết hợp với các biện pháp nhằm tối ưu hóa đặc tính ma sát, điều này giúp xe sử dụng nhiên liệu thấp và lượng chất thải ở mức trung bình. Tuy nhiên, những biện pháp này không có nghĩa là chiếc xe sẽ hoạt động ở mức công suất hay mô men thấp hơn.
				</p>	
				<img src="./image_price/gle400_os.jpg" class="d-block w-100" alt="..." id="image_os"><br>
				<p><b>Hộp số tự động 9 cấp 9G-TRONIC</b><br>
Trải nghiệm sự thoải mái khi sang số: Chúng tôi phát triển và sáng chế một kết cấu hệ truyền động nhằm đem đến trải nghiệm lái tiện nghi, hiệu quả và năng động.

Hộp số tự động 9 cấp 9G-TRONIC gây ấn tượng với khả năng sang số nhanh chóng và quá trình sang số nhẹ nhàng. Đồng thời, giúp làm giảm lượng nhiên liệu sử dụng. Phạm vi tỷ lệ truyền động lớn có thể làm giảm tốc độ của động cơ.

Với đặc tính xử lý tốt cố định, sự tiện nghi khi lái xe tăng lên và giảm tiếng ồn sinh ra. Vì hộp số có thể nhảy số, nên có thể trả nhiều số để tăng tốc nhanh và mạnh mẽ.
				</p>
				
				
			</div>
			<div class="cost">
				<h2>Giá bán</h2>
				<div class="grid">
					<figure class="effect-steve">
						<img src="./image_price/gle400_out2.jpg"/>
						<figcaption>
							<h2><strong>3.899.000.000 đ</strong></h2>
							<p>Giảm ngay <strong>20%</strong> giá xe<br>Tặng bảo hiểm xe + phụ kiện trang bị</p>
							
						</figcaption>			
					</figure>
					<figure class="effect-steve">
						<img src="./image_price/gle400_cost.jpg"/>
						<figcaption>
							<h2><strong>Hỗ trợ cho vay</strong></h2>
							<p>Ngân hàng hỗ trợ vay đến <strong>80%</strong><br>Thời gian cho vay lên đến <strong>9 năm</strong></p>
							
						</figcaption>			
					</figure>
				</div>	
			</div>
		</div>
	</div>
	<div class="vd">
		<div class="content">
			<h2 class="text-success font-weight-bold text-uppercase">Bình luận</h2>
			<div class="comment">
			<?php foreach($listcmt as $cmt): ?>
				<p><span class="text-primary">[<?=date("Y-m-d H:i",$cmt[0])?>]</span> <span class="text-success"><?=$cmt[2]?>: </span><span class="text-secondary"><?=$cmt[1]?></span></p>
			<?php endforeach ?>
			</div>
			<?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true): ?>
			<form action="../account/comment.php" method="post">
				<div class="input-group mb-3">
				<input type="text" class="form-control" name="content" placeholder="Viết bình luận..." aria-label="Recipient's username" aria-describedby="button-addon2">
				<input class="btn btn-success" type="submit" name="subcomment" value="Gửi">
				</div>
			</form>
			<?php else: ?>
				<a class = "btn btn-primary" href = "../login/index.php">Đăng nhập để bình luận</a>
			<?php endif ?>
		</div>
	</div>	
</div>






<!--Footer-->

<div class="page-wrapper">
  <div id="waterdrop"></div>
  <footer>
    <div class="footer-top">
      <div class="pt-exebar">

      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-12 col-sm-12 footer-col-3">
            <div class="widget footer_widget">
              <h5 class="footer-title">Khách hàng</h5>
              <p>Câu hỏi thường gặp</p>
              <p>Hỗ trợ khách hàng</p>
              <p>Hỗ trợ bảo trì</p>
              <p>Hướng dẫn sử dụng</p>
              <p>Lịch dịch vụ</p>
              <p>Hướng dẫn thanh toán</p>
            </div>
          </div>
          <div class="col-12 col-lg-6 col-md-6 col-sm-12">
            <div class="row">
              <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                <div class="widget footer_widget">
                  <h5 class="footer-title">Dịch vụ</h5>
                  <p>Bảo hành</p>
                  <p>Thay thế thiết bị</p>
                  <p>Sửa chữa</p>
                  <p>Mua linh kiện phụ tùng</p>
                  <p>Báo giá sản phẩm</p>
                  <p>Mua xe mới</p>
                </div>
              </div>
              <div class="col-6 col-lg-6 col-md-6 col-sm-6">
                <!-- <div class="widget">
                  <h5 class="footer-title">Email Us</h5>
                  <div class="textwidget">
                    <div role="form" class="wpcf7" id="wpcf7-f4-o1" lang="en-US" dir="ltr">

                      <form method="post" class="wpcf7-form" novalidate="novalidate">

                        <div class="contact-form-footer">
                          <p><span class="wpcf7-form-control-wrap your-first-name"><input type="text" name="your-first-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Your name"></span></p>
                          <p><span class="wpcf7-form-control-wrap your-email_1"><input type="email" name="your-email_1" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false" placeholder="Your email"></span></p>
                          <p><span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Your message"></textarea></span></p>
                          <div><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div> -->
                 <div class="widget widget_gallery gallery-grid-4">
              <h5 class="footer-title">Về chúng tôi</h5>
              <p>Giới thiệu</p>
              <p>Chính sách đại lý</p>
              <p>Thông báo</p>
              <p>Khuyến mãi</p>
              <p>Tài liệu</p>
              <p>Blog</p>
            </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
            <!-- <div class="widget widget_gallery gallery-grid-4">
              <h5 class="footer-title">Dunno</h5>
            </div> -->
            <div class="widget">
              <h5 class="footer-title">Phản hồi</h5>
              <div class="textwidget">
                <div role="form" class="wpcf7" id="wpcf7-f4-o1" lang="en-US" dir="ltr">

                  <form method="post" class="wpcf7-form" novalidate="novalidate">

                    <div class="contact-form-footer">
                      <p><span class="wpcf7-form-control-wrap your-first-name"><input type="text" name="your-first-name" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Your name"></span></p>
                      <p><span class="wpcf7-form-control-wrap your-email_1"><input type="email" name="your-email_1" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-email" aria-invalid="false" placeholder="Your email"></span></p>
                      <p><span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Your message"></textarea></span></p>
                      <div><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
            <nav id="footer-navigation" class="site-navigation footer-navigation centered-box" role="navigation">
              <ul id="footer-menu" class="nav-menu styled clearfix inline-inside">
                <li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26"><a href="#">Bản quyền nội dung</a></li>
                <li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27"><a href="#">Cài đặt</a></li>
                <li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28"><a href="#">Quyền riêng tư và bảo vệ dữ liệu</a></li>
                <li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29"><a href="#">Thông tin pháp lý</a></li>
              </ul>
            </nav>

            <div id="footer-socials">
              <div class="socials inline-inside socials-colored">

                <a href="#" target="_blank" title="Facebook" class="socials-item">
                  <i class="fa fa-facebook-official" aria-hidden="true"></i>
                </a>
                <a href="#" target="_blank" title="Twitter" class="socials-item">
                  <i class="fa fa-twitter-square" aria-hidden="true"></i>

                </a>
                <a href="#" target="_blank" title="Instagram" class="socials-item">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#" target="_blank" title="YouTube" class="socials-item">
                  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
                <a href="#" target="_blank" title="Telegram" class="socials-item">
                  <i class="fa fa-telegram" aria-hidden="true"></i>
                </a>
              </div>
            </div>

        </div>
      </div>
    </div>
  </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>

<script> jQuery('#waterdrop').raindrops({color:'#1c1f2f', canvasHeight:150, density: 0.1, frequency: 20});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  
</body>
</html>
