<!DOCTYPE html>
<html lang="en">
<?php  include 'ketNoi.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa hàng</title>
</head>

<body>
    <?php 
$maHang = $_GET["maHang"];
$sql = "Delete From hanghoa Where MAHANG = '$maHang'";
if(mysqli_query($con, $sql)){
    echo "Xóa thành công.";
    echo "<script>window.location.href='index.php?page=danhSach'</script>";
} else{
    echo "ERROR: Không thể thực thi truy vấn $sql. " . mysqli_error($con);
}
?>
</body>

</html>