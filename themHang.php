<!DOCTYPE html>
<html lang="en">
<?php
include_once("ketNoi.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hàng hóa</title>
    <link rel="stylesheet" href="../webThucPham1-main/style/style_index.css">
</head>
<STYle>
     .btn_sua {
        width: 90px;
        height: 30px;
        background-color: rgb(125, 198, 66);
        text-transform: uppercase;
        color: #fff;
        border: none;
        cursor: pointer;
        margin-top: 12px;
    }
      
      .suaAnh {
        margin-left: 15px;
    }
    .table_themhang{
        margin-left: 200px;
    }
     .title__dshang {
        font-weight: 600;
        margin: 10px 0;
        font-size: 18px;
    }
     .input_ThemMoi {
        width: 250px;
        height: 25px;
        margin: 10px 0 0 15px;
        border: 1px solid rgb(177, 177, 177);
    }
    
    .btn_Anh1 {
        margin-top: 10px;
    }
    
    .btn_submit {
        margin-left: 90px;
    }
    .btn_sua:hover {
        transition: 0.2s ease-in-out;
        background-color: #000;
    }
</STYle>
<body>

    <form method="post" enctype="multipart/form-data">
        <center>
            <table align="center" cellpadding="3" cellSpacing="0" class="table_themhang">
                <caption class="title__dshang">THÊM MỚI SẢN PHẨM</caption>
                <tr>
                    <td>Mã hàng:</td>
                    <td><input class="input_ThemMoi" type="text" name="txtMahang"></td>
                </tr>
                <tr>
                    <td>Tên hàng:</td>
                    <td><input class="input_ThemMoi" type="text" name="txtTenhang"></td>
                </tr>
                <tr>
                    <td>Mã loại:</td>
                    <td><input class="input_ThemMoi" type="text" name="txtMaloai"></td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td><input class="input_ThemMoi" type="text" name="txtDongia"></td>
                </tr>
                <tr>
                    <td>Số lượng:</td>
                    <td><input class="input_ThemMoi" type="text" name="txtSoluong"></td>
                </tr>
                <tr>
                    <td>Mô tả:</td>
                    <td><input class="input_ThemMoi" type="text" name="txtMota"></td>
                </tr>
                <tr>
                    <td>Ảnh</td>
                    <td><input class="suaAnh btn_Anh1" type="file" name="txtAnh"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="btn_sua btn_submit" name="submit" value="Thêm mới">
                        <input type="reset" class="btn_sua " name="" value="Nhập lại">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <p id="loi" style="color: red;"></p>
                    </td>
                </tr>
            </table>
        </center>
    </form>
    <?php
	if (isset($_POST["submit"])) {
		$maHang = $_POST["txtMahang"];
		$tenhang = $_POST["txtTenhang"];
		$maloai = $_POST["txtMaloai"];
		$dongia = $_POST["txtDongia"];
		$soluong = $_POST["txtSoluong"];
		$moTa = $_POST["txtMota"];
		$anh = $_FILES["txtAnh"]["name"];
		$dd = $_FILES["txtAnh"]["tmp_name"];
		move_uploaded_file($dd, "img/$anh");
		$sql = "insert into hanghoa values ('$maHang','$tenhang','$maloai',$dongia,$soluong,'$moTa','$anh')";
        echo $sql;
		$result = mysqli_query($con,$sql);
		if ($result) {
            echo "<script>window.location.href='index.php?page=dsHangHoa'</script>";
		} else {
		?>
    <script>
    document.getElementById("loi").innerHTML = "Lỗi ! Mời kiểm tra lại dữ liệu";
    </script>
    <?php
		}
	}
	?>
</body>

</html>