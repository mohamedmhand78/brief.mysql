<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cruds.css">
</head>
<body>
<?php
   $servername = 'mysql:host=localhost;dbname=test;';

   $user = 'root';

   $pass = '';

   try {
       $connect = new PDO($servername, $user, $pass);

       $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect->prepare("SELECT * FROM testtb1");
        $stmt ->execute();
        $rep =  $stmt -> fetchAll();
        echo "<table>";
        echo "<tr>";
        echo "<th> FirstName </th>";
        echo "<th> LastName </th>";
        echo "<th> Email </th>";
        echo "<th colspan='2'> Operations </th>";
        echo "</tr>";
        

        foreach( $rep as $row ) {
            echo "<tr>
                    <td>{$row['First_name']}</td>
                    <td>{$row['Last_name']}</td>
                    <td>{$row['Email']}</td>
                    <td><button class='btn'><a href='delete.php?id={$row['id']}'>Delete</a></button></td>
                    <td><button class='btn'><a href='update.php?id={$row['id']}'>Update</a></button></td>
                </tr>";
        };
        echo "</table>";
    }catch(PDOException $e) {
        echo "error";
    }
?>
<button class='btn' id="addbtn"><a href="insertdata.php">Add Users</a></button>
</body>
</html>