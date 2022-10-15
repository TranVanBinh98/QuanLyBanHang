<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
echo "xoa";
if(isset($_GET['mahang']))
{
unset($_SESSION['giohang'][$_GET['mahang']]);
header("location:index.php?page=giohang");
}
?>
</body>

</html>