<?php
session_start();
if(isset($_SESSION['is_login'])) if($_SESSION["is_login"] == true) header("Location: http://localhost/WEB-ASSIGNMENT_1/cms/index.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Mercedes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../image/logo.png" />
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">  
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <!-- Reponsive -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" type="text/css" href="./Home.css">
</head>
<body>

    <img id="fixed-background" src="../image/fixed-background.jpg" alt="fixed-image">
    <div class="header-background">
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
                  <?php if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == true) echo "Trang cá nhân";
                        else echo "Đăng nhập"; ?>
                </a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Home/Home.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../Introduce/Introduce.php">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../Product/Products.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="../Price/Pricea200.php">Bảng giá</a>
                </li>
                <li class="nav-item">
                    <a href="../Contact/Contacts.php" class="nav-link" aria-current="page">Liên hệ</a>
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
    <div class="container">
        <form class="row justify-content-center" action="insert.php" method="post">
            <?php if(isset($_SESSION["error"])):?>
            <div style="color:red" class="mb-3 col-md-7 text-center">
                <p><?php echo $_SESSION["error"] ?></P>
            </div>
            <?php endif ?>
            <div class="mb-3 col-md-7">
                <label for="formGroupExampleInput" class="form-label">Tên đầy đủ</label>
                <input type="text" name="name" size="50" class="form-control" id="formGroupExampleInput" placeholder="Nhập Họ và tên">
            </div>
            <div class="mb-3 col-md-7">
                <label for="formGroupExampleInput" class="form-label">Tài khoản</label>
                <input type="text" name="username" size="25" class="form-control" id="formGroupExampleInput" placeholder="Tài khoản">
            </div>
            <div class="mb-3 col-md-7">
                <label for="formGroupExampleInput2" class="form-label">Mật khẩu</label>
                <input type="password" name="password" size="25" class="form-control" id="formGroupExampleInput2" placeholder="Mật khẩu">
            </div>
            <div class="mb-3 col-md-7">
                <label for="formGroupExampleInput2" class="form-label">SĐT</label>
                <input type="text" name="phonenum" size="10" class="form-control" id="formGroupExampleInput2" placeholder="Số điện thoại">
            </div>
            <div class="mb-3 col-md-7">
                <label for="formGroupExampleInput2" class="form-label">Email</label>
                <input type="text" name="email" size="10" class="form-control" id="formGroupExampleInput2" placeholder="Email">
            </div>
            <div class="mb-3 col-md-6">
            <input type="submit" name="dang-ky" value="Đăng ký">
            <a href="http://localhost/WEB-ASSIGNMENT_1/login/index.php">Đăng nhập</a>
            </div>
        </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>

<script> jQuery('#waterdrop').raindrops({color:'#1c1f2f', canvasHeight:150, density: 0.1, frequency: 20});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="/index.js"></script>

</body>
</html>

