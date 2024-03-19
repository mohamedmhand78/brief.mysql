<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="insertdata.css">
</head>
<body>
    <?php
$servername = 'mysql:host=localhost;dbname=test;';

$user = 'root';

$pass = '';

try {
    $connect = new PDO($servername, $user, $pass);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $connect->prepare("SELECT * FROM testtb1 WHERE id=:id");
     $stmt->bindParam(':id',$id);
     $stmt ->execute();
     $rep =  $stmt -> fetchAll();
        foreach( $rep as $row ) {
           
        
?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="">First Name</label>
        <input type="text" name="firstname" value="<?php echo $row['First_name']?>" required>
        <br>
        <br>
        <label for="">Last Name</label>
        <input type="text" name="lastname" value="<?php echo $row['Last_name']?>" required>
        <br>
        <br>
        <label for="">Email</label>
        <input type="text" name="email" value="<?php echo $row['Email']?>" required>
        <br>
        <br>
        <input type="submit" name="submit" value="Update" class="sub">
    </form>
    <?php
    };
} catch (PDOException $e) {
    echo "<p id='red'>Error</p>" . $e->getMessage();
    
}
    if (isset($_POST["submit"])) {
        @$firstname = $_POST["firstname"];
        @$lastname = $_POST["lastname"];
        @$email = $_POST["email"];

        try {
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $connect->prepare("UPDATE `testtb1` SET First_name=:firstname, Last_name=:lastname, Email=:email WHERE id=:id");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':firstname',$firstname);
        $stmt->bindParam(':lastname',$lastname);
        $stmt->bindParam(':email',$email);
        $stmt ->execute();
        header('Location:cruds.php');
        } catch (PDOException $e) {
            echo "<p id='red'>Error</p>" . $e->getMessage();
            
        }
    }
    $connect = null;
    ?>
</body>
</html>