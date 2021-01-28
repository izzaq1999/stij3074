<?php
session_start();
include_once("dbconnect.php");
$ic = $_GET['ic']; 
$name = $_GET['name'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }
echo "<head><link rel='stylesheet' href='styles.css'><link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\"></head>";

echo "<p>Welcome " . $_SESSION["name"] . ".<br></p>";
if (isset($_SESSION["name"])){

//delete operation
if (isset($_COOKIE["timer"])){
    if (isset($_GET['operation'])) {
      $id = $_GET['id'];
      try {
        $sql = "DELETE FROM patient WHERE ic='$ic' AND id='$id'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {
        if (isset($_GET['subject'])) {
            $subject = $_GET['subject'];
            $sql = "SELECT * FROM patient WHERE ic = '$ic' AND patientname LIKE '%$subject%' ORDER BY patientname ASC";
        }else{
            $sql = "SELECT * FROM patient WHERE ic = '$ic' ORDER BY patientname ASC";    
        }
        
        $stmt = $conn->prepare($sql );
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $patient = $stmt->fetchAll(); 
        echo "<p><h1 align='center'>Patient Data</h1></p>";
        echo "
        <form class=\"example\" action=\"mainpage.php\" style=\"margin:auto;max-width:300px\">
        <input type=\"text\" placeholder=\"Search by patient name..\" name=\"subject\">
        <input type=\"hidden\" name=\"ic\" value=$ic>
        <input type=\"hidden\" name=\"name\" value=$name>
        <button type=\"submit\"><i class=\"fa fa-search\"></i></button>
        </form><br>";
        
        echo "<table border='1' align='center'>
        <tr>
          <th>ID</th>
          <th>Health Problem</th>
          <th>Description</th>
          <th>Medicine</th>
          <th>Patient Name</th>
          <th>Operation</th>

        </tr>";
        
        foreach($patient as $patient) {
            echo "<tr>";
            echo "<td>".$patient['id']."</td>";
            echo "<td>".$patient['healthproblem']."</td>";
            echo "<td>".$patient['description']."</td>";
            echo "<td>".$patient['medicine']."</td>";
            echo "<td>".$patient['patientname']."</td>";
            echo "<td><a href='mainpage.php?ic=".$ic."&name=".$name. "&id=".$patient['id']."&healthproblem=".$patient['healthproblem']."&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
            <a href='update.php?ic=".$ic."&name=".$name."&healthproblem=".$patient['healthproblem']."&description=".$patient['description'].
            "&medicine=".$patient['medicine']."&patientname=".$patient['patientname']." '>Update</a></td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo "<p align='center'><button onclick=\"window.print()\">Print this page</button>";
        echo "<p align='center'><a href='newpatient.php?ic=".$ic."&name=".$name."'>Insert new data</a></p>";
      
        echo "<p align='center'><a href='index.html'>Login</a></p>";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}else{
  echo "<script> alert('Timer expired!!!')</script>";
  echo "<script> window.location.replace('index.html') </script>;";
}
}else{
  //echo "<script> alert('Session Expired!!!')</script>";
  echo "<script> window.location.replace('index.html') </script>;";
}
  $conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style>

body {
            background-image: url(http://www.pngmagic.com/product_images/light-blue-sky-background.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        
        }

<link rel="stylesheet" href="styles.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Main Page</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>

<body>

</body>

</html>