<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="createdb.css">
</head>

<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="form">
        <input type="text" name="dbname" placeholder="Create Database" class="inp">
        <input type="submit" name="create" value="Create" class="sub">

    </form>
    <?php

    if (isset($_POST["create"])) {
        @$inpval = $_POST["dbname"];
        $servername = 'mysql:host=localhost;';

        $user = 'root';

        $pass = '';

        try {
            $connect = new PDO($servername, $user, $pass);

            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $q = "CREATE DATABASE $inpval";
            $connect->exec($q);

            echo "<p id='green'> Database Created Successfuly</p>";
        } catch (PDOException $e) {
            echo "<p id='red'>Creation Failed</p>" . $e->getMessage();
        }
    }
    $connect = null;
    ?>
</body>

</html>