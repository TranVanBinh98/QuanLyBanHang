<!DOCTYPE html>
<html lang="en">

<?php include_once('ketNoi.php');?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href=" https://fontawesome.com/v5/search">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;1,400;1,500&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Playfair+Display:wght@400;500&display=swap"
        rel="stylesheet">

    <style>
    .next-trang {
        margin-top: -60px;
    }
    </style>
</head>

<body>
    <?php 
    
    if(!isset($_GET['maloai']))
    {
     $sosp=6;
     $trang=!empty($_GET['trang'])?$trang=$_GET['trang']:1;
     $trangBatDau=((int)$trang-1)*$sosp;
   
     $result=mysqli_query($con,"Select* from hanghoa");
     $demsp=mysqli_num_rows($result);
     $sotrang=ceil($demsp/$sosp);  
     $sql="select*from hanghoa LIMIT $trangBatDau,$sosp ";
     $query=mysqli_query($con,$sql);
    }
    else{
     $maloai=$_GET['maloai'];
     // $result=mysqli_query($con,"Select* from HangHoa where MaLoai='$maloai'");
     // $demsp=mysqli_num_rows($result);
     // $sotrang=ceil($demsp/$sosp);  
     // echo "$sotrang";
    $sql="select*from hanghoa where MALOAI='$maloai' ";
    $query=mysqli_query($con,$sql);

    } ?>

    <div class="home-categories">
        <h4 class="hedding-title">
            TẤT CẢ CÁC SẢN PHẨM
        </h4>
        <img src="img/footer1.jpg" alt="" class="sanpham_img">
        <div class="home-categories-wrap-content">
            <ul class="home-categories-box">
                <?php while($rows=mysqli_fetch_array($query)){ ?>
                <li class="home-categories-item">
                    <div class="home-categories-img">
                        <div class="home-categories-img-item">
                            <div class="box-hover-img">
                                <!-- <a href="product.html"><img src="img/products/produc-1_2.jpg" alt=""></a> -->
                                <a href="index.php?mahang=<?php                             
                                echo $rows['MAHANG']?>&page=themhang" class="home-catgories-add"><img
                                        src="img/<?php echo $rows['ANH']?>" alt=""></a>

                            </div>
                        </div>
                        <div class="home-categories-hot">
                            <p>-20%</p>
                        </div>
                        <div class="home-categories-box-icon">

                            <a href="index.php?mahang=<?php                             
                                echo $rows['MAHANG']?>&page=themhang" class="home-catgories-add"><i
                                    class="far fa-shopping-basket giohang_hover_sanpham"></i></a>
                        </div>
                    </div>
                    <div class="home-categories-infor">

                        <h4>
                            <a class="home-categories-name-product" href=""><?php echo  $rows['TENHANG'];?></a>
                        </h4>
                        <h4 class="home-categories-name-product sanpham_dongia "><?php echo $rows["DONGIA"]?>đ</h4>
                    </div>
                </li><?php }?>
            </ul>
        </div>
        <div class="next-trang">
            <?php
                  if(!isset($_GET['maloai'])){
                    $next= (int)$trang+1;
                    $back= (int)$trang-1;
            $i=1;
            if($sosp>=6){
            ?>
                <a href="index.php?page=sanpham&trang=<?php echo $back?>" class="back_next_Trag"><i class="fas fa-angle-double-left"></i>Back</a><?php }?>
            <?php
            for($i=1;$i <= $sotrang;$i++){
              ?>
            <a href="index.php?page=sanpham&trang=<?php echo $i?>'" class="next_page"><?php echo $i?></a>
            <?php }}?>
                    <a href="index.php?page=sanpham&trang=<?php echo $next?>" class="back_next_Trag">Next<i
                    class="fas fa-angle-double-right"></i></a>
        </div>

</body>

</html>