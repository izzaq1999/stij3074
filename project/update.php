
<?php
include_once("dbconnect.php");
$ic = $_GET['ic'];
$name = $_GET['name'];
$healthproblem = $_GET['healthproblem'];
$description = $_GET['description'];
$medicine = $_GET['medicine'];
$patientname = $_GET['patientname'];

if (isset($_GET['operation'])) {
    try {
        $sqlupdate = "UPDATE patient SET description = '$description', medicine = '$medicine', patientname = '$patientname' WHERE ic = '$ic' AND healthproblem = '$healthproblem'";
        $conn->exec($sqlupdate);
        echo "<script> alert('Update Success')</script>";
        echo "<script> window.location.replace('mainpage.php?ic=".$ic."&name=".$name."') </script>;";
      } 
      catch(PDOException $e) {
        echo "<script> alert('Update Error')</script>";
      }
    }
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>

body {
            background-image: url(https://www.paymentsjournal.com/wp-content/uploads/2020/04/573774-PLOMDL-386-scaled.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        
        }
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


<body>
<p>
<h2 align='center'><?php echo $name?></h2>
</p>

   <h2 align="center">Update <?php echo $patientname?> </h2>

    <form action="update.php" method="get" align="center" onsubmit="return confirm('Update?');">
        <input type="hidden" id="name" name="name" value="<?php echo $name;?>"><br>
        <input type="hidden" id="ic" name="ic" value="<?php echo $ic;?>"><br>
        <input type="hidden" id="healthproblem" name="healthproblem" value="<?php echo $healthproblem;?>" required><br>
        <input type="hidden" id="operation" name="operation" value="update"><br>
        <label for="email">Description:</label><br>
        <input type="text" id="description" name="description" value="<?php echo $description;?>" required><br>
        <label for="medicine">Medicine:</label><br>
        <input type="text" id="medicine" name="medicine" value="<?php echo $medicine;?>" required><br>
        <label for="password">Patient Name</label><br>
        <input type="text" id="patientname" name="patientname" value="<?php echo $patientname;?>" required><br><br>
        <input type="submit" value="Update">
    </form>
    <p align="center"><a href="mainpage.php?ic=<?php echo $ic.'&name='.$name?>">Cancel</a></p>
</body>

</html>