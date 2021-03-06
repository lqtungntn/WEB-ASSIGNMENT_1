<?php
session_start();
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
  <link rel="stylesheet" type="text/css" href="./Home.css">
</head>
<body>

  <img id="fixed-background" src="../image/fixed-background.jpg" alt="fixed-image">
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
              <a href="../Contact/Contacts.php" class="dropdown-item" aria-current="page">Liên hệ</a>
              <?php if(isset($_SESSION['is_login'])):?>
                <a class="dropdown-item" aria-current="page" href="../account/index.php">Trang cá nhân</a>
              <?php endif ?>
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
                <a class="nav-link" aria-current="page" href="../Price/Price.html">Bảng giá</a>
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
    <section class="showcase">
      <div class="showcase-container w3-container w3-center">
        <h1 class="w3-text-shadow w3-animate-opacity">Thế giới Mercedes</h1>
        <hr>
        <p class="w3-animate-opacity">Mercedes có thể tự hào về sản phẩm của mình không chỉ có thiết kế tốt nhất và sang trọng mà còn là công nghệ tốt nhất. Mercedes-benz đặt chân lần đầu vào Việt Nam vào năm 1995 và là thành viên của tập đoàn DaimlerChrysler, hãng là một trong những đơn vị phân phối ô tô hàng đầu tại Việt Nam. Những sản phẩm của hãng thiên về chất lượng và kiểu dáng được đánh giá hiện đại luôn luôn bắt kịp những xu hướng của thị trường. Với một thương hiệu xuất thân từ đất nước có nền công nghiệp sản xuất ô tô phát triển cực thịnh như Đức, ngay lập tức hãng chiếm được lòng tin của khách hàng.</p>
        <button onclick="document.getElementById('start-modal').style.display='block'" class="w3-button w3-red w3-large w3-opacity">Khám phá</button>
      </div>
    </section>
  </div>
  
  <!-- Video -->
  <div class="video-container">
    <div class="video-text"> 
      <h2>MERCEDES-BENZ</h2>
      <p>Mercedes-Benz là một trong những hãng sản xuất xe ô tô, xe buýt, xe tải danh tiếng trên thế giới. Hãng được xem là hãng sản xuất xe hơi lâu đời nhất còn tồn tại đến ngày nay. Khởi đầu, hãng thuộc sở hữu bởi Daimler-Benz.</p> 
      <p>Hiện tại, hãng là một thành viên của công ty mẹ, Daimler AG (tên trước đây là DaimlerChrysler AG). Mercedes-Benz còn là một trong những hãng đi tiên phong trong việc giới thiệu nhiều công nghệ và những sáng kiến về độ an toàn mà sau đó đã trở nên phổ biến trên toàn thế giới. </p>
      <p>Các dòng xe Mercedes-Benz phổ biển:</p>
    <ul>
      <li>Dòng xe Mercedes-Benz A Class</li>
      <li>Dòng xe Mercedes-Benz B Class</li>
      <li>Dòng xe Mercedes-Benz C Class</li>
      <li>Dòng xe Mercedes-Benz E Class</li>
    </ul>
    </div>
      <video autoplay muted loop class="myVideo">
      <source src="../video1.mp4" type="video/mp4">
       </video>
  </div>

  <div class="container-2">
    <h2>TẠI SAO BẠN NÊN CHỌN MERCEDES</h2>
  <div class="column-layout">
    <div class="column--1">
      <h4>TIÊN PHONG VỀ CÔNG NGHỆ AN TOÀN</h4>
      <p>Trong hơn nửa thập kỷ, các kỹ sư của Mercedes đã tận tụy chuẩn bị cho một khoảnh khắc mà họ hy vọng không bao giờ xảy ra.
        Đó là các kỹ sư của hãng đã nghiên cứu trang bị cho những mẫu xe của họ các trang bị an toàn tiên tiến nhất.</p>
        <p> Để giảm tới mức tối đa tỉ lệ tai nạn xảy ra, cùng với các hệ thống bảo vệ người lái và hành khách trong xe. Khi chẳng may có sự cố phát sinh, giảm tỉ lệ nghiêm trọng của sự cố xuống mức thấp nhất có thể. Các kỹ sư của Mercedes luôn làm việc hết mình để chuẩn bị cho mẫu xe mình các công nghệ bảo vệ và giảm thiểu tính nghiệm trong của các sự cố.
      </p>
    </div>
    <div class="column--1">
      <h4>TIÊU CHUẨN KHẮT KHE NHẤT THẾ GIỚI</h4>
      <P>Mỗi chiếc Mercedes được giao tới tay khách hàng phải đạt tất cả các tiêu chuẩn cao nhất của hãng đã đặt ra. Không chỉ là thiết kế bề ngoài, mà cảm giác tới từng chi tiết nhỏ trong nội thất, cảm giác lái và cả âm thanh chiếc xe phát ra.</P> 
      <p>Đối với Mercedes họ không quan đến việc chế tạo ra những chiếc xe chỉ đơn thuần là mạnh mẽ hay tốc độ cao. Thay vào đó, họ chế tạo những chiếc ô tô kết hợp nhiều khía cạnh của hiệu suất, thiết kế nội ngoại thất, để tạo ra thứ gì đó phi thường.</p> 
      <p>Slogan Mercedes nói lên tất cả: "The best or nothing – Tốt nhất hoặc không là gì cả".</P>
    </div>
  </div>
  <div class="column-layout">
    <div class="column--1">
      <h4> MERCEDES LÀ HÃNG XE HƠI CÓ LỊCH SỬ LÂU ĐỜI NHẤT THẾ GIỚI</h4>
      <p>Kể từ khi phát minh ra chiếc xe hơi đầu tiên, Mercedes đã định hình tiêu chuẩn cho ngành sản xuất ô tô. Với các mẫu xe đặc trưng cho sự an toàn, hiệu suất và cảm giác lái xe tuyệt vời. Chỉ có một lý do khiến nhà sản xuất ô tô đầu tiên trên thế giới vấn đứng đầu ngành đến nay, đó là sự đổi mới liên tục.</p>
    </div>
    <div class="column--1">
      <h4>THƯƠNG HIỆU ĐẲNG CẤP NHẤT THẾ GIỚI</h4>
      <P> Mercedes là thương hiệu ô tô có giá trị lớn nhất thế giới, khi nhắc đến Mercedes người ta sẽ nghĩ ngay đến tầng lớp tinh hoa thành đạt, những người không chỉ tạo ra nhiều của cải cho chính mình mà họ còn đóng góp rất nhiều cho xã hội. </P>
    </div>
  </div>
</div>

  <div class="video-container">
      <video autoplay muted loop class="myVideo">
      <source src="../video2.mp4" type="video/mp4">
       </video>
    <div class="video-text"> 
      <h2>First Move The World
      </h2>
<p>Mục tiêu của Mercedes-Benz được đúc kết trong câu 'First Move The World', có thể hiểu là động lực, là ý nghĩa của mọi việc chúng tôi thực hiện. 'First Move the World' là lời thúc đẩy phải đạt được nhiều hơn, tiến xa hơn những mục tiêu ngay trước mắt. Tinh thần quả cảm đó là sức sống của thương hiệu, hoặc theo cách gọi của chúng tôi - ADN của thương hiệu.</p>    
<p>Giữa những biến đổi, tinh thần ấy giúp định hướng cho chiến lược kinh doanh hòa hợp và bền vững, và cho mọi quyết định. Tinh thần đó được thể hiện qua Tầm nhìn 2039 – con đường đến với di chuyển bền vững, tìm các nguồn năng lượng xanh, and duy trì quan hệ đối tác chiến lược cho các dự án xe không người lái với Tập đoàn mẹ Daimler và Tập đoàn BMW.</p>
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
