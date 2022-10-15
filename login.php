<!DOCTYPE html>
<?php include_once('ketNoi.php');?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="shop-right-box  login-test">
        <center>
            <form action="" method="post">
                <table>
                    <h3> Đăng nhập tài khoản</h3>
                    <tr>
                        <td><input type="text" placeholder="Email.." name="txtName"> </td>
                    </tr>
                    <tr>
                        <td><input type="text" placeholder="Password.." name="txtPass"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Đăng nhập">
                    </tr>
                </table>
            </form>
        </center>
        <?php
    $pass=$user="";
    if (isset($_POST['submit'])) 
{
     //Lấy dữ liệu nhập vào
    $user = $_POST["txtName"];
    $pass = $_POST["txtPass"];
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$user || !$pass) {?>
        <p class='dangki_text'>Vui lòng nhập đầy đủ thông tin</p>
        <?php  }
    $sql="SELECT * FROM dktv WHERE username='$user' and password='$pass'";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){ 
    $_SESSION['user'] = $user;
    $_SESSION['pass'] = $pass;
    echo "<script>window.location.href='index.php'</script>";
    }
    else{
       ?> 
       <p class='dangki_text'>Đăng nhập thất bại!</p>
       <p style="text-align: center;">Bạn chưa có tài khoản đăng kí <a href="index.php?page=signup">Tại đây</a></p>
        <?php 
    }
}
    ?>
        <?php    if(isset($_GET["page"]))
            {
                $page=$_GET["page"];
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
            ?>
    </div>
</body>

</html>