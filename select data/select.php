<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <title>Document</title>
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
        echo "</tr>";
        

        foreach( $rep as $row ) {
            echo "<tr>
                    <td>{$row['First_name']}</td>
                    <td>{$row['Last_name']}</td>
                    <td>{$row['Email']}</td>
                </tr>";
        };
        echo "</table>";
    }catch(PDOException $e) {
        echo "error";
    }
?>
</body>
</html>