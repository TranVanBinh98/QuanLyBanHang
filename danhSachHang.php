<!DOCTYPE html>
<?php include_once('ketNoi.php');?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết nôi CSDL</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
.nextTrang {
    float: right;
    margin-top: 40px;
    position: absolute;
    right: 0;

}
table{
    position: relative;
}
</style>

<body>
    <?php 
    $sosp=6;
    $trang=!empty($_GET['trang'])?$trang=$_GET['trang']:1;
    $trangBatDau=((int)$trang-1)*$sosp;
    $result1=mysqli_query($con,"Select* from hanghoa");
    $demsp=mysqli_num_rows($result1);
    $sotrang=ceil($demsp/$sosp);  
        if (isset($_POST['submit'])) {
            $key = $_POST['txtTenHang'];
            if($key ==""){
                echo'<script language="javascript">alert("Hãy nhập sản phẩm để tìm kiếm");window.location="index.php?page=danhSach";</script>';
                exit;
            }else{
                $sql = "SELECT* from hanghoa where TENHANG like'%$key%' or MAHANG LIKE '%$key%' or MALOAI LIKE '%$key%' LIMIT $trangBatDau, $sosp";
            }
        } else {
            $sql = "SELECT* FROM hanghoa LIMIT $trangBatDau, $sosp";
        }
        $result = mysqli_query($con, $sql);
 ?>
    <div class="danhSach">
        <center>
            <table border="1" cellpadding="8" cellSpacing="0" style="width: 100%;">
                <Caption style="font-size: 20px;"></b>DANH SÁCH SẢN PHẨM</b></Caption>
                <tr>
                    <th>Mã hàng</th>
                    <th>Tên hàng</th>
                    <th>Đơn gia</th>
                    <th>Số lượng</th>
                    <th>Mô tả</th>
                    <th>Mã loại</th>
                    <th colspan="2">Ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php     
 while($row=mysqli_fetch_array($result))
 {
           echo "<tr>";
           $maHang=$row['MAHANG'];
           echo "<td>".$row['MAHANG']. "</td>";
           echo "<td>".$row['TENHANG']." </td>";
           echo "<td>".$row['DONGIA']. "</td>";
           echo "<td>".$row['SOLUONG']. "</td>";
           echo "<td>".$row['MOTA']." </td>";
           echo "<td>".$row['MALOAI']."</td>";
           echo "<td colspan='2'><img src='img/".$row["ANH"]."' width='70px' height='70px'/> </td>";       
            echo "<td><a href='index.php?page=suahang&maHang=$maHang'><img src='img/sua.svg' width='20px' height='20px' class='danhSach-img'></a></td>";
           echo "<td><a href='xoaHang.php?maHang=$maHang'  onclick='return checkDelete()'><img src='img/xoa.png' width='20px' height='20px' class='danhSach-img'></a></td>";         
           echo "</tr>";         
 }

?>
<tr>
    <td colspan="10" style="border: none;">
    <div class="nextTrang">
    <?php
            $next= (int)$trang+1;
            $back= (int)$trang-1;
            $i=1;?>
             <a href="index.php?page=danhSach&trang=<?php echo $back?>" class="back_next_Trag"><i class="fas fa-angle-double-left"></i>Back</a>
            <?php
            for($i=1;$i <= $sotrang;$i++){?>
                    <a href="index.php?page=danhSach&trang=<?php echo $i?>'" class="next_page"><?php echo $i?></a>
             <?php }?>
             <a href="index.php?page=danhSach&trang=<?php echo $next?>" class="back_next_Trag">Next<i class="fas fa-angle-double-right"></i></a>
    </div>
    </td>
</tr>
            </table>
        </center>
    </div>
</body>

</html>
<script language="JavaScript" type="text/javascript">
function checkDelete() {
    return confirm('Bạn chắc chắn muốn xóa ma hàng <?php echo $maHang ?>? ');
}

</script>