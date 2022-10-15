<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fontawesome.com/v5/search">
</head>
<style>
.giohang-btn-xoa i {
    font-size: 20px;
    color: red;
}

.giohang-boder {
    border: 1px solid black;
}

table {
    margin: 40px 0px 0px 60px;
    /* border: 1px solid #ccc; */
    text-align: center;
}

table th {
    background-color: #dddd;
    height: 40px;
}

.giohang-input-btn {
    margin: 20px 0px 0px 680px;
}

.giohang-input-btn input {
    background-color: black;
    color: white;
    width: 80px;
    height: 35px;
    outline: one;
    border: none;
    margin: 5px;
}

.giohang_mota {
    margin: 50px 0px 0px 50px;
    font-size: 16px;

}
</style>

<body>

    <?php 
//xu ly cap nhat gio hang
$giohang=$_SESSION['giohang'];
//neu nguoi dung cap nhat lai gio hang(an nut cap nhat)
if(count($giohang)==0){?>
    <p class="giohang_mota">Giỏ hàng của bạn đang trống!</p><?php 
}
if(isset($_POST['capnhat'])&& count($giohang)!=0)
{$soluong_cn = $_POST['soluong'];
    foreach($soluong_cn as $mahang => $sl)
    {
      // neu nguoi dung dat lại so luong =0 thi ta huy luon sp do
        if($sl==0)
        {
            unset($_SESSION['giohang'][$mahang]);
        }
       //nguọc lai cap nhat lại sl trongn gio hang
       else
        if($sl >0 && is_numeric($sl))
        {
            $_SESSION['giohang'][$mahang]=$sl;       
        }
        echo "<script>window.location.href='index.php?page=giohang'</script>";        
    }}
    //xu ly hien gio hang
    if(count($giohang)){
?>
    <div class="giohang-noidung">
        <form method="POST">
            <table cellpadding="8" cellSpacing="0">

                <h4 class="giohang_mota">Giỏ hàng của bạn</h4>


                <tr>
                    <th style="width: 100px;">Mã hàng</th>
                    <th style="width: 150px;">Anh</th>
                    <th style="width: 150px;">Tên hàng</th>
                    <th style="width: 100px;">Số lượng</th>
                    <th style="width: 100px;">Đơn giá</th>
                    <th style="width: 100px;">Thành tiền</th>
                    <th style="width: 100px;">Xóa hàng</th>
                </tr>
                <?php 
            $server="localhost";
            $user="root";
            $pass="";
            $database="QLBH";
    //Câu lệnh kết nối nêu knoi tra về  
            $con= mysqli_connect($server,$user,$pass,$database);
            $tongcong=0;
            foreach($giohang as $mahang => $sl)
            {
                //lay thong tin san pham
                $sql="select* From hanghoa where MAHANG in ('$mahang')";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($result);
               ?>

                <tr>
                    <td><?php echo $row['MAHANG']?></td>
                    <td> <img src="img/<?php echo $row['ANH'];?>" width="100px" height="100px"></td>
                    <td><?php echo $row['TENHANG']?></td>
                    <td><input type='text' name='soluong[<?php echo $mahang;?>]' size='3' value='<?php echo $sl; ?>'>
                    </td>
                    <td><?php echo number_format($row['DONGIA']);?></td>
                    <td><?php echo number_format($sl*$row['DONGIA'],0);?></td>
                    <td><a class="giohang-btn-xoa" href="xoaGioHang.php?mahang=<?php echo $row['MAHANG']; ?>">
                            <i class="fas fa-times-circle"></i></a>
                    </td>
                </tr>

                <?php 
                $tongcong+=$sl*$row["DONGIA"];}?>
                <tr>
                    <td colspan="7" style="text-align: right;">
                        Tổng cộng: <?php echo number_format($tongcong);?>đ
                    </td>
                </tr>
            </table>
            <div class="giohang-input-btn">
                <input type="submit" name="capnhat" value="Cập nhật">
                <input type="button" name="muathem" value="Mua thêm" id="muathem"
                    onclick="window.location='index.php?page=sanpham'"> <?php }?>

            </div>
        </form>
    </div>
</body>

</html>