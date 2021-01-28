<?php
include_once("dbconnect.php");
$ic = $_GET['ic'];
$name = $_GET['name'];

// if (isset($_COOKIE["email"])){
//   echo "Value is: " . $_COOKIE["email"];
// }
echo "<head></head><link rel='stylesheet' href='styles.css'></head>";

if (isset($_GET['healthproblem'])) {
  $id = $_GET['id'];
  $healthproblem = $_GET['healthproblem'];
  $description = $_GET['description'];
  $medicine = $_GET['medicine'];
  $patientname = $_GET['patientname'];
  $ic = $_GET['ic'];
  try {
    $sql = "INSERT INTO patient(id, healthproblem, description, medicine, patientname, ic)
    VALUES ('$id','$healthproblem', '$description', '$medicine','$patientname','$ic')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "<script> alert('Insert Success')</script>";
    echo "<script> window.location.replace('mainpage.php?ic=".$ic."&name=".$name."') </script>;";

  } catch(PDOException $e) {
    echo "<script> alert('Insert Error')</script>";
    //echo "<script> window.location.replace('register.html') </script>;";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>

    <style>

body {
            background-image: url(https://cdn.hipwallpaper.com/i/87/66/LWOAm3.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        
        }
        .center {
          .center {
            margin: auto;
            width: 40%;
            border: 3px solid #000000;
            background-color: #ffffff;
            padding: 10px;
            opacity: 0.9;
            font-weight: bold;
            color: #000000;
        }
    </style>
</head>

<p>
<h2 align="center">Welcome</h2>
<h2 align='center'><?php echo $name?></h2>
</p>

<body>
    <h2 align="center">Insert New Data</h2>

    <form action="newpatient.php" method="get" align="center" onsubmit="return confirm('Insert new data?');">
        <input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="ic" name="ic" value="<?php echo $ic;?>"><br>
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" value="" required><br>
        <label for="Health Problem">Health Problem:</label><br>
        <input type="text" id="healthproblem" name="healthproblem" value="" required><br>
        <label for="email">Description:</label><br>
        <input type="text" id="description" name="description" value="" required><br>
        <label for="ic">Medicine:</label><br>
        <input type="text" id="medicine" name="medicine" value="" required><br>
        <label for="password">Patient Name</label><br>
        <input type="text" id="patientname" name="patientname" value="" required><br><br>
        <input type="submit" value="Submit" class="button">
    </form>
    <p align="center"><a href="mainpage.php?ic=<?php echo $ic.'&name='.$name?>">Cancel</a></p>
</body>

</html>