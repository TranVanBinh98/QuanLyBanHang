<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- thêm sản phẩm đã đuọc đặt mua thì thêm sản pham moi vai -->
    <?php 
    $server="localhost";
    $user="root";
    $pass="";
    $database="QLBH";
    //Câu lệnh kết nối nêu knoi tra về  
   $con= mysqli_connect($server,$user,$pass,$database);
    $mahang=$_GET['mahang'];
    if($mahang!="")
    {
        $sql="select MAHANG from HangHoa where MAHANG in ('$mahang')";
        $result=mysqli_query($con,$sql);
        $row=mysqli_num_rows($result);
        if($row==1){//neu co trong csdl
            //neu co trong gio hang
            if(isset($_SESSION['giohang'][$mahang])){
                //tăng số lươngk lên 1
                $_SESSION['giohang'][$mahang]++;

            }
            else{
                //neu chua co trong gior hang
                $_SESSION['giohang'][$mahang]=1;
            }
            //mở trang giỏ hàng
            echo "<script>window.location.href='index.php?page=giohang'</script>";    
            //header('location:index.php?page=giohang');    
        }
        else
        {   
            echo "<script>window.location.href='index.php?page=sanpham'</script>";  
        }

    }
   
   ?>
</body>

</html>