<!DOCTYPE html>
<?php include_once('ketNoi.php');?>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;1,300;1,400&family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container-wedding">
        <header>
            <!-- Phần menu -->
            <div class="menu">
                <div class="content-menu">
                    <div class="conten-menu-logo">
                        <img src="img/logo1.png" alt="">
                    </div>
                    <div class="content-menu-right">
                        <ul class="content-menu-text menu-text-firt ">
                            <li class="content-menu-text-li"><a href="index.php?page=sanpham">HOME</a>
                                <ul class="sub-menu">
                                    <li class="sub-menu-li"><a href="#">Home main</a></li>
                                    <li class="sub-menu-li"><a href="#">Home one page</a></li>
                                    <li class="sub-menu-li"><a href="#">Home planing</a></li>
                                    <li class="sub-menu-li"><a href="#">Home announcement</a></li>
                                    <li class="sub-menu-li"><a href="#">Wedding anniversary</a></li>
                                </ul>
                            </li>
                            <li class="content-menu-text-li"><a href="#">PAGES</a></li>
                            <li class="content-menu-text-li"><a href="#">PORTFOLIO</a>
                                <ul class="sub-menu">
                                    <li class="sub-menu-li"><a href="#">Pinterest 3 columns</a></li>
                                    <li class="sub-menu-li"><a href="#">Pinterest 3 columns</a></li>
                                    <li class="sub-menu-li"><a href="#">Multi grid 3 columns</a></li>
                                    <li class="sub-menu-li"><a href="#">Multi grid 4 columns</a></li>
                                    <li class="sub-menu-li"><a href="#">Multi grid 5 columns</a></li>
                                    <li class="sub-menu-li"><a href="#">Multi grid 6 columns</a></li>
                                </ul>
                            </li>
                            <li class="content-menu-text-li"><a href="#">BOLG</a></li>
                            <li class="content-menu-text-li"><a href="#">SHOP</a></li>
                            <li class="content-menu-text-li"><a href="#">ELEMENT</a></li>
                            <li class="content-menu-text-li"><a href="#">RSVB</a>
                            </li>
                        </ul>
                        <ul class="content-menu-text">

                            <!-- Phần menu -->

                            <?php if(!isset($_SESSION["user"])){
                             ?>
                            <li class="menu-icon"> <a href='index.php?page=login' class="login_text"><i
                                        class="fal fa-user"></i>Log in</a>
                            </li>
                            <li class="menu-icon"><a href="index.php?page=signup" class="login_text"><i
                                        class="far fa-sign-out"></i>Signup</a> </li>
                            <?php 
                            }
                            else {  ?>
                            <li class="menu-icon"> <a href='#' class="login_text">Xin chào
                                    <?php echo $_SESSION['user']?>
                                </a> </li>
                            <li class=""><a href="logout.php" class="login_text"><i
                                        class="far fa-sign-out"></i>Thoát</a> </li>

                            <?php }?>
                            <li class="menu-icon icon-cart">
                                <?php
                         ?> <a href="index.php?page=giohang"> <i class="far fa-shopping-cart">

                                    </i>
                                    <div class="cart-number">
                                        <p class="cart-numer-cart-p"><?php 
                                    
                                    if(isset($_SESSION['giohang']))
                                    { echo count($_SESSION['giohang']);
                                    }
                                    else 
                                    {
                                        echo 0;
                                        // echo '<script>alert("Hien khong co san pham trong gio hang cua ban!");</script>';
                                    }
                                    ?></p>

                                    </div>

                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="home-content">
            <div class="shop-banner-box">
                <div class="shop-banner">
                    <h2 class="banner-shop-text-h2">Shop</h2>
                    <div class="shop-banner-text">
                        <a href="#">Home</a><i class="fas fa-chevron-right"></i><a href="">Shop</a>
                    </div>
                </div>
            </div>
            <div class="shop-content-wrap">
                <div class="shop-left-box">
                    <div class="shop-left-box-item">
                        <?php 	$Tenhang = "";?>
                        <div class="shop-search-section">
                            <form method="post" action="index.php?page=danhSach">
                                <input type="search" placeholder="Search products…" name="txtTenHang">
                                <input class="home-btn-search" type="submit" name="submit" value="Tìm kiếm">
                            </form>
                        </div>
                        <div class="shop-title-product">
                            <h4>DANH MỤC SẢN PHẨM
                            </h4>
                            <!-- LOAI HÀNG -->
                            <ul class="shop-sale-categories">
                                <li><a href="index.php?page=sanpham">Trang chủ</a></li>
                                <li><a href="index.php?page=danhSach">Danh sách sản phẩm</a></li>
                                <li><a href="index.php?page=themMoi">Thêm sản phẩm</a></li>
                                <li><a href="index.php?page=sanpham">Tất cả các sản phẩm</a></li>
                                <?php   $sql="select* from loaihang";                       
                              $result=mysqli_query($con,$sql);
                              while($row= mysqli_fetch_array($result)){?>
                                <li><a
                                        href="index.php?page=sanpham&maloai=<?php echo $row['MALOAI']?>"><?php echo $row['TENLOAI'];?></a>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                        <div class="shop-title-product">
                            <h4 class="">
                                TOP SALE PRODUCT </h4>
                            <div class="shop-sale-categories-bottom ">
                                <div class="shop-box-img">
                                    <a href="#"><img src="img/cachua.jpg" alt="" class="shop-sale-img"></a>
                                </div>
                                <div class="shop-sale-text">
                                    <h5 class="shop-sale-name"><a href="#" class="home-categories-name-product">Cà
                                            chua</a>
                                    </h5>
                                    <div class="home-categories-evaluate shop-categories-evaluate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p class="shop-sale-price home-categories-name-product">40,000 đ</p>
                                </div>
                            </div>
                            <div class="shop-sale-categories-bottom ">
                                <div class="shop-box-img">
                                    <div class="shop-box-img">
                                        <a href="#"><img src="img/carot.jpg" alt="" class="shop-sale-img"></a>
                                    </div>
                                </div>
                                <div class="shop-sale-text">
                                    <h5 class="shop-sale-name"><a href="#" class="home-categories-name-product"> Cà
                                            rốt</a>
                                    </h5>
                                    <div class="home-categories-evaluate shop-categories-evaluate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p class="shop-sale-price home-categories-name-product">10000 đ</p>
                                </div>
                            </div>
                            <div class="shop-sale-categories-bottom ">
                                <div class="shop-box-img">
                                    <a href="#"><img src="img/duahau.jpg" alt="" class="shop-sale-img"></a>
                                </div>
                                <div class="shop-sale-text">
                                    <h5 class="shop-sale-name"><a href="#" class="home-categories-name-product">Dưa
                                            hấu</a>
                                    </h5>
                                    <div class="home-categories-evaluate shop-categories-evaluate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p class="shop-sale-price home-categories-name-product">30 000 đ</p>
                                </div>
                            </div>
                            <div class="shop-sale-categories-bottom ">
                                <div class="shop-box-img">
                                    <a href="#"><img src="img/hat_2.jpg" alt="" class="shop-sale-img"></a>
                                </div>
                                <div class="shop-sale-text">
                                    <h5 class="shop-sale-name"><a href="#" class="home-categories-name-product">Hạnh
                                            nhân </a>
                                    </h5>
                                    <div class="home-categories-evaluate shop-categories-evaluate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p class="shop-sale-price home-categories-name-product">200 000 đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  $page="sanpham";
            if(isset($_GET["page"]))
            {
                $page=$_GET["page"];
            }
            if($page=="trangchu"){
                include_once("trangchu.php");
            }
            if($page=="login"){
                include_once("login.php");
            }
            if($page=="danhSach"){
                include_once("danhSachHang.php");
            }
            if($page=="themMoi"){
                include_once("themHang.php");
            }
            if($page=="signup"){
                include_once("dangKi.php");
            }    
            if($page=="suahang"){
                include_once("suahang.php");
            }  
            if($page=="sanpham"){
                include_once("sanpham.php");
            }  

            if($page=="themhang")
            {
                include_once("gioHang/themHang.php");
            }
            if($page=="giohang")
            {
                include_once("gioHang/giohang.php");
            }
        
          ?>
            </div>
        </div>
        <footer>
            <div id="footer">
                <div class="footer-top">
                    <h2 class="the_laster">GET THE LATEST NEWS AND OFFERS
                    </h2>
                    <div class="subsribe">
                        <div class="subsribe-item">
                            <input type="search" placeholder="Your rmail..">
                            <button>Subsribe</button>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="block-footer">
                        <div class="footer-item item-left">
                            <img src="img/logo1.png" alt="">
                            <ul class="store">
                                <li>
                                    Store - worldwide fashion store since 1978. We sell over 1000+ branded products on
                                    our web-site.</li>
                                <li> <i class="fas fa-map-marker-alt"></i>
                                    <p>

                                        451 Wall Street, USA, New York
                                </li>
                                </p>
                                <li><i class="fas fa-phone-alt"></i>
                                    <p>
                                        Phone: (064) 332-1233
                                </li>
                                </p>
                                <li> <i class="fas fa-envelope"></i>
                                    <p>
                                        sales@yourcompany.com
                                </li>
                                </p>
                            </ul>
                        </div>
                        <div class="footer-item">
                            <h2 class="the_laster">HERE TO HELP</h2>
                            <hr class="footer_hr">
                            <ul>
                                <li> Home Page</li>
                                <li> About us</li>
                                <li>Service</li>
                                <li>Privacy Policy</li>
                                <li>Terms&condion</li>
                            </ul>
                        </div>
                        <div class="footer-item ">
                            <h2 class="the_laster">WAYS TO SAVE</h2>
                            <hr class="footer_hr">
                            <ul>
                                <li>About us</li>
                                <li>Brands</li>
                                <li>Gift vouchers</li>
                                <li>Site map</li>
                                <li>Testimonials</li>
                            </ul>
                        </div>
                        <div class="footer-item">
                            <h2 class="the_laster">FACE BOOK</h2>
                            <hr class="footer_hr">
                            <iframe class="facebook"
                                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Feve.taoenvy%2F&tabs=timeline&width=290&height=235px&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId"
                                width="290" height="235px" style="border:none;overflow:hidden" scrolling="no"
                                frameborder="0" allowfullscreen="true"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                    <div class="make_by_creat">
                        <p class="make-by">
                            © 2021 Created by Trần Văn Bình. Premium e-commerce solutions.
                        </p>
                    </div>
                </div>
            </div>
    </div>
</body>


</html>