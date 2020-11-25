<?php

//get data
$FoodID = $_GET['FoodID'];
$FoodName = $_GET['FoodName'];
$Price = $_GET['Price'];
$Quantity = $_GET['Quantity'];
$Calorie = $_GET['Calorie'];

//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodorder";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO cuisine (FoodID, FoodName, Price, Quantity, Calorie)
  VALUES ('$FoodID', '$FoodName', '$Price', '$Quantity', '$Calorie')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;


?>
