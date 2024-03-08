<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="insertdata.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="">First Name</label>
        <input type="text" name="firstname" required>
        <br>
        <br>
        <label for="">Last Name</label>
        <input type="text" name="lastname" required>
        <br>
        <br>
        <label for="">Email</label>
        <input type="text" name="email" required>
        <br>
        <br>
        <input type="submit" name="submit" value="Insert" class="sub">
    </form>
    <?php
    if (isset($_POST["submit"])) {
        @$firstname = $_POST["firstname"];
        @$lastname = $_POST["lastname"];
        @$email = $_POST["email"];
        
        $servername = 'mysql:host=localhost;dbname=test;';

        $user = 'root';

        $pass = '';

        try {
            $connect = new PDO($servername, $user, $pass);

            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO testtb1 (First_name,Last_name,Email) VALUES ('$firstname','$lastname','$email')";
            $connect->exec($query);

            echo "<p id='green'>Data Inserted Successfuly</p>";
        } catch (PDOException $e) {
            echo "<p id='red'>Insertion Failed</p>" . $e->getMessage();
            
        }
    }
    $connect = null;
    ?>
</body>
</html>