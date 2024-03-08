<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="where.css">
</head>
<body>
    <form method="POST">
    <input type="text" name="inpval" placeholder="Filter Data">
    <input type="submit" name="select" value="Select" class="sub">
    </form>
<?php

echo "<table>";
echo "<tr>";
echo "<th> FirstName </th>";
echo "<th> LastName </th>";
echo "<th> Email </th>";
echo "</tr>";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $inpval = $_POST["inpval"];


   $servername = 'mysql:host=localhost;dbname=test;';

   $user = 'root';

   $pass = '';

   try {
       $connect = new PDO($servername, $user, $pass);

       $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect->prepare("SELECT * FROM `testtb1` WHERE Email like \"%$inpval%\"");
        $stmt ->execute();
        $rep =  $stmt -> fetchAll();
 
        

        foreach( $rep as $row ) {
            echo "<tr>
                    <td>{$row['First_name']}</td>
                    <td>{$row['Last_name']}</td>
                    <td>{$row['Email']}</td>
                </tr>";
        };
        echo "</table>";
    }catch(PDOException $e) {
        echo "<p id='red'>error</p>";
    }
}
?>
</body>
</html>