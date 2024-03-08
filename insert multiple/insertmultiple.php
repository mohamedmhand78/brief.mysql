<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="insertmultiple.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <div>
        <label for="">First Name</label>
        <input type="text" name="firstname1" required>
        <br>
        <br>
        <label for="">Last Name</label>
        <input type="text" name="lastname1" required>
        <br>
        <br>
        <label for="">Email</label>
        <input type="text" name="email1" required>
        <br>
        <br>
    </div>
    <div>
        <label for="">First Name</label>
        <input type="text" name="firstname2" required>
        <br>
        <br>
        <label for="">Last Name</label>
        <input type="text" name="lastname2" required>
        <br>
        <br>
        <label for="">Email</label>
        <input type="text" name="email2" required>
        <br>
        <br>
    </div>
    <input type="submit" name="submit" value="Insert" class="sub">
    </form>
    <?php
    if (isset($_POST["submit"])) {
        @$firstname1 = $_POST["firstname1"];
        @$lastname1 = $_POST["lastname1"];
        @$email1 = $_POST["email1"];
        @$firstname2 = $_POST["firstname2"];
        @$lastname2 = $_POST["lastname2"];
        @$email2 = $_POST["email2"];
        
        $servername = 'mysql:host=localhost;dbname=test;';

        $user = 'root';

        $pass = '';

        try {
            $connect = new PDO($servername, $user, $pass);

            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connet->beginTransaction();

            $query1 = "INSERT INTO testtb1 (First_name,Last_name,Email) VALUES ('$firstname1','$lastname1','$email1')";
            $connect->exec($query1);
            $query2 = "INSERT INTO testtb1 (First_name,Last_name,Email) VALUES ('$firstname2','$lastname2','$email2')";
            $connect->exec($query2);
            $connect->commit();

            echo "<p id='green'>Data Inserted Successfuly</p>";
        } catch (PDOException $e) {
            $connect->rollBack();
            echo "<p id='red'>Insertion Failed</p>" . $e->getMessage();
            
        }
    }
    $connect = null;
    ?>
</body>
</html>