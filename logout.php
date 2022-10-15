<!DOCTYPE html>
<html lang="en">
<?php  session_start()?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thế giới di động</title>
</head>

<body>
    <?php 
    unset($_SESSION["user"]);
    unset($_SESSION["pass"]);
    header('location:index.php');
    ?>
</body>

</html>