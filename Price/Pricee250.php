<?php
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$ppid = $_SESSION['pid'] = "7";
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
	<!--E250-->
		<div class="content">
			<div class="cover">
				<h2><strong>Tổng quan về Mercedes-Benz <span>E 250</span></strong></h2>
				<p>Chiếc E-Class mới là kết quả thuyết phục mạnh mẽ về triết lý thiết kế mới của Mercedes-Benz E 250. Xe là hiện thân của sự thanh nhã siêu hiện đại và phong cách thể thao tinh tế, và không có đối thủ trong phân khúc xe saloon cao cấp. Xe mang thiết kế thanh nhã mà vẫn mạnh mẽ trên từng đường nét - với sự nhẹ nhàng kinh ngạc.
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
				<li data-target="#carouselExampleCaptions" data-slide-to="10"></li>
			  </ol>
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  <img src="./image_price/e250_out1.jpg" class="d-block w-100" alt="">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Diện mạo sang trọng, chững chạc với kích thước 4.923 x 1.852 x 1.460 mm</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_out2.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Cụm lưới tản nhiệt hầm hố với hai nan ngang to bản và logo Mercedes cỡ lớn ở vị trí trung tâm. Bên cạnh là cụm đèn trước Multi-Beam LED tích hợp hai dải LED chiếu sáng ban ngày khá lôi cuốn.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_out3.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Dòng xe này được trang bị la-zăng hợp kim 18 inch 5 chấu</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_out4.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Ngoại thất</h5>
					<p>Cụm đèn hậu LED với các tinh thể pha lê lấp lánh tựa các vì sao khá sang trọng. Ngoài ra, phần đuôi xe không kém nổi bật với cụm ống xả đôi mạ chrome, thể thao không kém gì phiên bản E300 AMG.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_in1.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>Hệ thống đèn viền nội thất với 64 tông màu, hoàn toàn sử dụng công nghệ LED và có thể được điều chỉnh, làm mờ hoặc tắt một cách tiện nghi thông qua bộ đầu giải trí. Hệ thống được bật và tắt với hệ thống chiếu sáng bên ngoài và chào đón bạn khi mở cửa.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_in2.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>Hệ thống điều hòa tự động THERMOTRONIC</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_in3.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>Nếu xe được sử dụng bởi nhiều người, gói trang bị Nhớ tư thế ghế đem đến sự tiện lợi đặc biệt khi vận hành. Có thể lưu trữ và truy xuất lên tới ba vị trí khác nhau cho ghế trước, trụ lái và gương chiếu hậu ngoài xe chỉnh điện chỉ bằng một nút bấm.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_in4.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>Mui xe sẽ tự động đóng nếu hệ thống PRE-SAFE® của xe xác định có nguy hiểm khi mở cửa sổ trời toàn cảnh.</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_in5.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>Audio 20 USB đưa Internet tới xe của bạn</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_in6.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>13 loa hiệu suất cao cùng với các thiết bị điện tử và âm thanh được kết hợp chính xác với nội thất xe mang lại chất lượng âm thanh Burmester® hạng nhất</p>
				  </div>
				</div>
				<div class="carousel-item">
				  <img src="./image_price/e250_in7.jpg" class="d-block w-100" alt="...">
				  <div class="carousel-caption d-none d-md-block">
					<h5>Nội thất</h5>
					<p>COMAND Online thỏa mãn mọi mong muốn về thông tin giải trí, dẫn đường và liên lạc. Thông tin được hiển thị màu trên màn hình đa phương tiện 31,2 cm độ phân giải cao.</p>
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
				<p>Động cơ xe công suất 135 kilowatts[1] (184 hp) kết hợp giữa nhiều công nghệ hiện đại như phun nhiên liệu trực tiếp và tăng áp xả khí với quá trình đốt tăng cường và các bộ phận phụ trợ theo nhu cầu. Nhờ đó giúp giảm lượng tiêu thụ nhiên liệu và lượng khí thải đến mức trung bình 5,9-5,5 lít trên mỗi 100 km và 135-125 gam CO2 trên mỗi km [2].
				</p>
				<p>Động cơ xăng 4 xy-lanh trên chiếc E-Class Saloon được gắn với hệ thống phun xăng trực tiếp thế hệ thứ ba. Động cơ turbo tăng áp làm nổi bật hiệu suất tuyệt vời của xe, đặc biệt là ở tốc độ động cơ thấp và trung bình. Thêm vào đó là những nền tảng công nghệ như quá trình đốt cháy phân tầng cho phép đốt ở mức tỷ lệ nhiên liệu - khí thấp hơn. Ngoài ra, bơm nước bằng điện giúp làm giảm nhu cầu sử dụng năng lượng và giảm lượng khí thải CO2.
				</p>
				<p>Tiện nghi ở đẳng cấp cao nhất. Hộp số tự động 9 cấp mang lại sự năng động, hiệu quả hơn và không kém phần nổi bật là sự phấn khích. Với chín số tiến, hộp số tự động này đem đến sự hiệu quả, tiện nghi và năng động ở một chuẩn mực hoàn toàn mới. Hộp số gây ấn tượng với thao tác chuyển số nhẹ nhàng hơn và êm ái hơn. Đồng thời, 9G-TRONIC cũng giúp giảm mức tiêu thụ nhiên liệu.
				</p>
			</div>
			<div class="cost">
				<h2>Giá bán</h2>
				<div class="grid">
					<figure class="effect-steve">
						<img src="./image_price/filter_class e250.jpg"/>
						<figcaption>
							<h2><strong>2.479.000.000 đ</strong></h2>
							<p>Giảm ngay <strong>20%</strong> giá xe<br>Tặng bảo hiểm xe + phụ kiện trang bị</p>
							
						</figcaption>			
					</figure>
					<figure class="effect-steve">
						<img src="./image_price/c200_in4.jpg"/>
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
