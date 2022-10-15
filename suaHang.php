<!DOCTYPE html>
<?php 
    //gọi file kết nối
	include "ketNoi.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa hàng hóa</title>
</head>

<body>
    <?php 
	$mahang=$_GET["maHang"];
	$sql="Select * from hanghoa where MAHANG='$mahang'";
	$result=mysqli_query($con,$sql);

	$row=mysqli_fetch_array($result);   
    $maloai_hh=$row['MALOAI'];    
	// kq tra ve cua truy van
	if (isset($_POST['submit'])) {
		// lay thong so
		$tenhang=$_POST['txtTenhang'];
		$dongia=$_POST['txtDongia'];
		$soluong=$_POST['txtSoluong'];
		$dvt=$_POST['txtDVT'];
        $maloai=$_POST['txtMaloai'];
		$anh="";
		if (isset($_FILES['txtAnh'])) {
			$anh=$_FILES['txtAnh']["name"];
			$dd=$_FILES['txtAnh']['tmp_name'];
			move_uploaded_file($dd, "img/$anh");
		}
		if ($anh=="") {
			$sql="update HangHoa set TENHANG='$tenhang', DONGIA=$dongia, SOLUONG=$soluong, MOTA='$dvt', MALOAI='$maloai' where MAHANG='$mahang'";
		}
		else{
			$sql="update HangHoa set TENHANG='$tenhang', DONGIA=$dongia, SOLUONG=$soluong, MOTA='$dvt', MALOAI='$maloai', ANH='$anh'  where MAHANG='$mahang'";
		}
		// echo $sql;
		mysqli_query($con,$sql);
		// header("location:danhsachhang.php");
        echo "<script>window.location.href='index.php?page=danhSach'</script>";
	}
	?>

    <!-- sau khi lay dc tt ke form de ngta sua -->
    <div class="shop-right-box suahang">
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <caption class="suahang-caption">Sửa thông tin sản phẩm</caption>
                <tr>
                    <td>Mã hàng:</td>
                    <td>
                        <input type="text" name="txtMahang" value="<?php echo $row["MAHANG"]; ?>" readonly="true">
                    </td>
                    <td rowspan="6"><img src="img/<?php echo $row["ANH"];?>" width='200px' height='200px' alt=""
                            name="imgHang"></td>
                </tr>
                <tr>
                    <td>Tên hàng:</td>
                    <td>
                        <input type="text" name="txtTenhang" value="<?php echo $row['TENHANG']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td>
                        <input type="text" name="txtDongia" value="<?php echo $row['DONGIA']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng:</td>
                    <td>
                        <input type="text" name="txtSoluong" value="<?php echo $row['SOLUONG']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Đơn vị tính:</td>
                    <td>
                        <input type="text" name="txtDVT" value="<?php echo $row['MOTA']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Loai hang</td>
                    <td>
                        <select name="txtMaloai" id="">
                            <!-- <option value="">Mã Loại</option> -->
                            <?php
                        $sql="SELECT* FROM loaihang ";
                        $result=mysqli_query($con,$sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $maloai=$row["MALOAI"];
                            $tenloai=$row['TENLOAI'];
                         
                            if($maloai_hh==$row['MALOAI']){ 
                                echo "<option value='$maloai' selected='true'>$tenloai</option>";
                        } 
                        else {
                            echo "<option value='$maloai'>$tenloai</option>";
                        }}?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>Ảnh:</td>
                    <td>
                        <input type="file" name="txtAnh" value="<?php echo $row['ANH']; ?>" onchange="change_img();">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class='suahang-btn' type="submit" name="submit" value="Sửa">
                        <input class='suahang-btn' type="reset" name="reset" value="Làm lại">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<script>
function change_img() {
    var Element = document.getElementsByName("txtAnh")[0];
    var img = document.getElementsByName('imgHang')[0];
    var url = URL.createObjectURL(Element.files[0]);
    img.src = url;
}
</script>