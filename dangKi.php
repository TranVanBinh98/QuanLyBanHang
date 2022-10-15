<?php
include_once("ketNoi.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <title>ĐĂNG KÍ</title>
    <style>
         .title__dshang {
        font-weight: 600;
        margin: 10px 0;
        font-size: 20px;
    }
    .form_singup {
        line-height: 35px;
        
    }
    .table_dangki{
        margin-left: 200px;
    }
    .input__singup {
        width: 250px;
        height: 25px;
        margin-left: 15px;
        border: 1px solid rgb(177, 177, 177);
    }
    
    .btn_singup {
        width: 250px;
        height: 30px;
        background-color: rgb(125, 198, 66);
        text-transform: uppercase;
        color: #fff;
        border: none;
        margin-left: 15px;
        cursor: pointer;
    }
    
    .btn_singup:hover {
        transition: 0.2s ease-in-out;
        background-color: #000;
    }
    </style>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $firstName = $_POST['txtFirstname'];
        $lastName = $_POST['txtLastname'];
        $user = $_POST['txtUser'];
        $pass = $_POST['txtPass'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['txtPhone'];
        $NDK = $_POST['txtNDK'];
        $lever = (int)$_POST['lever'];
        
        // Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if (!$firstName || !$lastName || !$user || !$pass || !$email || !$phone || !$NDK )
        {
            echo'<script language="javascript">alert("Hãy nhập đầy đủ thông tin");window.location="index.php?page=signup";</script>';
            exit;
        }

        // kiểm tra user và email có bị trùng ko 
        $sql = "SELECT* FROM dktv Where username = '$$user' or email ='$email'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<script language="javascript">alert("Đã tồn tại trong csdl");window.location="index.php?page=signup";</script>';
        } else {
            $sql1 = "INSERT INTO dktv (firstname,lastname,username,password,email,phone,ngaydangki,lever)Values('$firstName','$lastName','$user','$pass','$email','$phone','$NDK','$lever')";
            $result1 = mysqli_query($con, $sql1);
            if ($result1) {
                echo '<script language="javascript">alert("Đăng kí thành công");window.location="index.php";</script>';
            } else {
                echo "lỗi! vui lòng đăng kí lại";
                echo "<script>window.location.href='index.php?page=signup'</script>";
            }
        }
    }
    ?>
    <center>
    <form action="" method="POST" class="form_singup" class="frm_dangki">
        <TAble align="center" cellpadding="3" cellSpacing="0" class="table_dangki">
            <caption class="title__dshang">ĐĂNG KÍ TÀI KHOẢN</caption>
            <tr>
                <td>Firstname</td>
                <td><input class="input__singup" type="text" name="txtFirstname"></td>
            </tr>
            <tr>
                <td>Lastname</td>
                <td><input class="input__singup" type="text" name="txtLastname"></td>
            </tr>
            <tr>
                <td>User</td>
                <td><input class="input__singup" type="text" name="txtUser"></td>
            </tr>
            <tr>
                <td>PassWord</td>
                <td><input class="input__singup" type="password" name="txtPass"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input class="input__singup" type="email" name="txtEmail"></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input class="input__singup" type="phone" name="txtPhone"></td>
            </tr>
            <tr>
                <td>Ngày đăng kí</td>
                <td><input class="input__singup" type="date" name="txtNDK"></td>
            </tr>
            <tr>
                <td>Lever</td>
                <td>
                    <select name="lever" class="input__singup" id="">
                        <option value="0">Thành viên</option>
                        <option value="1">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Đăng kí" class="btn_singup" name="submit"></td>
            </tr>
            <tr>
                <td></td>
                <td><p style="text-align: center;">Nếu bạn đã có tài khoản, trở về đăng nhập <a href="index.php?page=login">Tại đây</a></p></td>
            </tr>
        </TAble>
    </form>
    </center>
</body>

</html>