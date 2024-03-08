<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="createtb.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="">Table Name</label>
        <input type="text" name="tablename" required>
        <br>
        <br>
        <label for="">Column1</label>
        <input type="text" name="column1" required>
        <br>
        <br>
        <label for="">Column2</label>
        <input type="text" name="column2" required>
        <br>
        <br>
        <label for="">Column3</label>
        <input type="text" name="column3" required>
        <br>
        <br>
        <input type="submit" name="create" value="Create" class="sub">
    </form>
    <?php
    if (isset($_POST["create"])) {
        @$tablename = $_POST["tablename"];
        @$column1 = $_POST["column1"];
        @$column2 = $_POST["column2"];
        @$column3 = $_POST["column3"];
       
        
        $servername = 'mysql:host=localhost;dbname=test;';

        $user = 'root';

        $pass = '';

        try {
            $connect = new PDO($servername, $user, $pass);

            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "CREATE TABLE $tablename (
                $column1 VARCHAR(50) NOT NULL ,
                $column2 VARCHAR(50) NOT NULL ,
                $column3 VARCHAR(50) NOT NULL )";

            $connect->exec($query);

            echo "<p id='green'> Table Created Successfuly</p>";
        } catch (PDOException $e) {
            echo "<p id='red'>Creation Failed</p>" . $e->getMessage();
            
        }
    }
    $connect = null;
    ?>
</body>
</html>