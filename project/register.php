<?php
include_once("dbconnect.php");

//if (isset($_COOKIE["timer"])){

//get data first
$name = $_POST['name'];
$email = $_POST['email']; 
$ic = $_POST['ic'];
$password = sha1($_POST['password']);

    try {
            $sql = "INSERT INTO doctor(name, email, password,ic)
            VALUES ('$name', '$email', '$password','$ic')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "<script> alert('Registration Success')</script>";
            echo "<script> window.location.replace('index.html') </script>;";
        } catch(PDOException $e) {
            echo "<script> alert('Registration Error')</script>";
            echo "<script> window.location.replace('register.html') </script>;";
        }
        $conn = null;

//}else{
//  echo "<script> alert('Timer expired!!!')</script>";
//  echo "<script> window.location.replace('index.html') </script>;";
//}
?>