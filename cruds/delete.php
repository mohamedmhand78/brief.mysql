<?php
$id = $_GET['id'];
$servername = 'mysql:host=localhost;dbname=test;';

   $user = 'root';

   $pass = '';

   try {
       $connect = new PDO($servername, $user, $pass);

       $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect->prepare("DELETE FROM testtb1 WHERE id=:id");
        $stmt->bindParam(':id',$id);
        $stmt ->execute();
        header('Location:cruds.php');
    }catch(PDOException $e) {
        echo "error";
    }
?>