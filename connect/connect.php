<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="connect.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="form">
        <input type="submit" name="connect" value="Connect" class="sub">
    </form>
    <?php 
    if(isset($_POST["connect"])){
$servername = 'mysql:host=localhost;';

$user = 'root';

$pass = '';

$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $connect = new PDO($servername, $user, $pass, $options);
    
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<p id='green'>Connected Successfuly</p>";
}
catch(PDOException $e) {
    echo '<p id="red">Connection Failed</p>' . $e->getMessage();
}
    }
    $connect = null;
?>
</body>
</html>
