<!DOCTYPE html>
<?php
session_start();
?>
<html lang="vi">
<head>
  <title>Mercedes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../image/logo.png" />
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="./Introduce.css">
  <link href="scroll.css" rel="stylesheet">
</head>
<body>
    <div class=header-background>
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
                <a href="../Contact/Contacts.php" class="dropdown-item" aria-current="page" >Liên hệ</a>
                <a class="dropdown-item" href="../account/index.php" class="nav-link" aria-current="page">
                  <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) echo "Trang cá nhân";
                        else echo "Đăng nhập"; ?>
                </a>
              </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="../Home/Home.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="../Introduce/Introduce.php">Giới thiệu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="../Product/Products.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="../Price/Price.html">Bảng giá</a>
                </li>
                <li class="nav-item">
                  <a href="/Contact/Contacts.php" class="nav-link" aria-current="page">Liên hệ</a>
                </li>
              </ul>
            </div>
            <a href="../account/index.php" class="nav-link" aria-current="page">
              <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) echo "Trang cá nhân";
                    else echo "Đăng nhập"; ?>
            </a>
            <div class="logo"><img class="logo" src="../image/logo.png" alt=""></div>
          </div>
        </nav>
      </div>
    </div>
    <div class="container-fluid m-0 p-0 slide">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner h-100">
          <div class="carousel-item active">
            <img class="d-block w-100 " src="../image/slide-intro-1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 " src="../image/carousel1.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 " src="../image/carousel2.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <h2 class="text-center text-uppercase font-weight-bold pt-5 pb-2">Giới thiệu Mercedes</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-6 my-auto d-md-none">
          <img class="image-size show-on-scroll inline-photo main-photo" src="../image/intro-1.jpg" alt=" Mercedes-Benz- Siêu xe Đức">
        </div>
        <div class="col-md-6 text-justify my-auto">
          <p class="text-inline">
            Mercedes-Benz là một trong những hãng xe hơi lâu đời nhất thế giới. Qua nhiều năm tháng nhưng biểu tượng ngôi sao 3 cánh vẫn được giữ nguyên và luôn đẳng cấp. Những thiết kế ấn tượng cùng với chất lượng cao cấp, xe của hãng xe Đức này luôn thu hút được những ánh nhìn đầu tiên.
          </p>
          <p class="text-inline pt-2">Xét về cơ bản thì Mercedes-Benz có 5 dòng chính được đặt tên lần lượt là A,B,C,E và S, thêm một dòng ở phân khúc cao cấp hơn là Maybach.</p>
    
          <p class="text-inline pt-2 show-on-scroll"> Cuối những ký tự đó là chữ “Class” thể hiện đây là một dòng xe. Dòng xe càng về cuối từ trái sang phải thì có thiết kế càng lớn cũng như dung tích động cơ lớn và mạnh mẽ hơn.</p>
            
          <p class="text-inline pt-2"> Mỗi dòng xe lại có những dòng xe nhỏ khác ở bên trong, phong cách thiết kế thì tượng tự nhau chỉ khác biệt ở các tính năng. Việc này giúp chia nhỏ phân khúc và đáp ứng được nhiều yêu cầu của khách hàng hơn.</p>
        </div>
        <div class="col-md-6 my-auto d-none d-md-block">
          <img class="image-size show-on-scroll inline-photo main-photo" src="../image/intro-1.jpg" alt=" Mercedes-Benz- Siêu xe Đức">
        </div>
      </div>
    </div>
    <h2 class="text-center text-uppercase font-weight-bold pt-5 pb-2">Các dòng xe Mercedes</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-6 my-auto">
          <img class="image-size show-on-scroll inline-photo" src="../image/mer1.jpg" alt=" Mercedes-Benz- Siêu xe Đức">
        </div>
        <div class="col-md-6 my-auto text-inline">
          <h3 class="font-weight-bold pb-3">Dòng Mercedes A Class</h3>
          <p>Đây là dòng xe nhỏ nhất của Mercedes-Benz (Compact car), những chiếc xe này được ra đời vào tháng 9/1993. Dòng A Class này được sử dụng hệ dẫn động cầu trước đầu tiên.
            <br>
            <strong>Dòng A Class gồm các thế hệ:</strong></p>
            <ul>
              <li>Giai đoạn 1997 – 2004: Thế hệ thứ nhất – W168</li>
              <li>Giai đoạn 2004 – 2012: Thế hệ thứ hai – W169</li>
              <li>Giai đoạn 2012 – nay: Thế hệ thứ ba – W176</li>
            </ul>            
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 my-auto d-md-none">
          <img class="image-size show-on-scroll inline-photo" src="../image/mer2.jpg" alt=" Mercedes-Benz- Siêu xe Đức">
        </div>
        <div class="col-md-6 my-auto text-inline">
          <h3 class="font-weight-bold pb-3">Dòng Mercedes B-Class</h3>
          <p>Đây là dòng xe gia đình cỡ nhỏ, có kích thước lớn hơn dòng A Class một chút. Những dòng xe này được gọi chung là MPV
            <br>
            <strong>Dòng B Class gồm các thế hệ:</strong></p>
            <ul>
              <li>Giai đoạn 2005 – 2011: Thế hệ thứ nhất – W245</li>
              <li>Giai đoạn 2011 – nay: Thế hệ thứ hai – W246</li>
            </ul>            
        </div>
        <div class="col-md-6 my-auto d-none d-md-block">
          <img class="image-size show-on-scroll inline-photo" src="../image/mer2.jpg" alt=" Mercedes-Benz- Siêu xe Đức">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 my-auto">
          <img class="image-size show-on-scroll inline-photo" src="../image/mer3.jpg" alt=" Mercedes-Benz- Siêu xe Đức">
        </div>
        <div class="col-md-6 my-auto text-inline">
          <h3 class="font-weight-bold pb-3">Dòng Mercedes C Class</h3>
          <p>Là những chiếc xe sedan cỡ nhỏ của Mercedes-Benz được cho ra mắt vào năm 1993. Đây là dòng xe mang lại doanh thu cao nhất cho hãng xe nước Đức này, khi ra mắt C-Class thay thế cho thế hệ W201. Những chiếc xe của C-Class được trang bị các hệ thống động cơ như I4, V6 và V8. Sử dụng hệ dẫn động RWD hoặc 4Matic.
            </p>
            <p>
            Ngoài ra C-Class còn có các biến thể khác nữa như là Wagon, Convertible, Coupe. Chiếc xe hiệu năng cao nổi tiếng của hãng là C63 AMG.
            <strong>Dòng C Class gồm các thế hệ:</strong></p>
            <ul>
              <li>Giai đoạn 1993 – 2000: Thế hệ thứ nhất – W202</li>
              <li>Giai đoạn 2000 – 2007: Thế hệ thứ hai – W203</li>
              <li>Giai đoạn 2007 – 2014: Thế hệ thứ ba – W204</li>
              <li>Giai đoạn 2014 – nay: Thế hệ thứ tư – W205</li>
            </ul>            
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 my-auto d-md-none">
          <img class="image-size show-on-scroll inline-photo" src="../image/mer4.jpg" alt=" Mercedes-Benz- Siêu xe Đức">
        </div>
        <div class="col-md-6 my-auto text-inline">
          <h3 class="font-weight-bold pb-3">Dòng Mercedes E-Class</h3>
          <p>Bạn có biết chữ E tượng trưng cho gì không? Là chữ “Einspritz” trong tiếng Đức có nghĩa là “phun xăng”, đúng vậy những chiếc thuộc dòng E Class này được sử dụng hệ thống phun xăng điện tử đó chính là nguồn gốc cho tên gọi này.
            <br>
            <strong>Dòng E Class gồm các thế hệ:</strong></p>
            <ul>
              <li>Giai đoạn 1993 – 1995: Thế hệ thứ nhất – W124.</li>
              <li>Giai đoạn 1995 – 2002: Thế hệ thứ hai – W120.</li>
              <li>Giai đoạn 2002 – 2009: Thế hệ thứ ba – W211.</li>
              <li>Giai đoạn 2009 – 2016: Thế hệ thứ tư – W212.</li>
              <li>Giai đoạn 2016 – nay: Thế hệ thứ năm – W213.</li>
            </ul>            
        </div>
        <div class="col-md-6 my-auto d-none d-md-block">
          <img class="image-size show-on-scroll inline-photo" src="../image/mer4.jpg" alt=" Mercedes-Benz- Siêu xe Đức">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 my-auto">
          <img class="image-size show-on-scroll inline-photo" src="../image/mer3.jpg" alt=" Mercedes-Benz- Siêu xe Đức">
        </div>
        <div class="col-md-6 my-auto text-inline">
          <h3 class="font-weight-bold pb-3">Dòng xe S-Class</h3>
          <p>Nếu không tính tới Mercedes Maybach thì có lẽ những chiếc xe S Class sẽ là xe đẳng cấp và sang trọng nhất trong bộ sưu tập các dòng xe của Mercedes-Benz. Dòng S-Class này được ra đời vào năm 1972, được nhiều nguyên thủ quốc gia ưa thích và lựa chọn về độ tiện nghi “khủng khiếp” bên trong.
            </p>
            <p>
            Có thể bạn chưa biết, dòng S-Class sử dụng hệ thống phanh ABS đầu tiên trên thế giới đời xe W116 từ năm 1978.
            <strong>Dòng S Class gồm các thế hệ:</strong></p>
            <ul>
              <li>Giai đoạn 1972 – 1980: Thế hệ thứ nhất – W116</li>
              <li>Giai đoạn 1979 – 1991: Thế hệ thứ hai – W126</li>
              <li>Giai đoạn 1991 – 1998: Thế hệ thứ ba – W140</li>
              <li>Giai đoạn 1998 – 2005: Thế hệ thứ tư – W220</li>
              <li>Giai đoạn 2005 – 2013: Thế hệ thứ năm – W221</li>
              <li>Giai đoạn 2013 – nay: Thế hệ thứ sáu – W222</li>
            </ul>            
        </div>
      </div>
    </div>
    <div class="page-wrapper">
      <div id="waterdrop"></div>
      <footer>
        <div class="footer-top">
          <div class="container">
              <div class="customer-column">
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
                  <div class="service-column">
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
                  <div class="about-us-column">
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
              <div class="contact-column">
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
        <div class="footer-bottom">
          <div class="container-last">
                <nav id="footer-navigation" class="site-navigation footer-navigation centered-box">
                  <ul id="footer-menu" class="nav-menu styled clearfix inline-inside">
                    <li id="menu-item-26" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-26"><a href="#">Bản quyền nội dung</a></li>
                    <li id="menu-item-27" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-27"><a href="#">Cài đặt</a></li>
                    <li id="menu-item-28" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-28"><a href="#">Quyền riêng tư và bảo vệ dữ liệu</a></li>
                    <li id="menu-item-29" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-29"><a href="#">Thông tin pháp lý</a></li>
                  </ul>
                </nav>
    
                <div id="footer-socials">
                  <div class="socials inline-inside socials-colored">
    
                    <a href="#" target="_blank" title="Facebook" class="socials-item facebook">
                      <i class="fa fa-facebook-official" aria-hidden="true"></i>
                    </a>
                    <a href="#" target="_blank" title="Twitter" class="socials-item twitter">
                      <i class="fa fa-twitter-square" aria-hidden="true"></i>
    
                    </a>
                    <a href="#" target="_blank" title="Instagram" class="socials-item instagram">
                      <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="#" target="_blank" title="YouTube" class="socials-item youtube">
                      <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    </a>
                    <a href="#" target="_blank" title="Telegram" class="socials-item telegram">
                      <i class="fa fa-telegram" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
          </div>
        </div>
      </footer>
      </div>

   
    
    
<script src="show-on-scroll.js"></script>
<script src="https://use.fontawesome.com/648b985d60.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>
<script> jQuery('#waterdrop').raindrops({color:'#1c1f2f', canvasHeight:150, density: 0.1, frequency: 20});
</script>
</body>
</html>
