<?php
session_start();
include_once("dbconnect.php");

echo "Welcome " . ".<br>";

    if (isset($_GET['operation'])) {
      $id = $_GET['id'];
      try {
        $sql = "DELETE FROM book WHERE id='$id'";
        $conn->exec($sql);
        echo "<script> alert('Delete Success')</script>";
      } catch(PDOException $e) {
        echo "<script> alert('Delete Error')</script>";
      }
    }

    try {

        $sql = "SELECT * FROM book";
        $stmt = $conn->prepare($sql );
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $book = $stmt->fetchAll(); 
        echo "<p><h1 align='center'>Your Book</h1></p>";
        echo "<table border='1' align='center'>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Author</th>
          <th>Price</th>
          <th>Description</th>
          <th>Publisher</th>
          <th>ISBN</th>
          <th>Operation</th>
        </tr>";
        
        foreach($book as $book) {
            echo "<tr>";
            echo "<td>".$book['id']."</td>";
            echo "<td>".$book['title']."</td>";
            echo "<td>".$book['author']."</td>";
            echo "<td>".$book['price']."</td>";
            echo "<td>".$book['description']."</td>";
            echo "<td>".$book['publisher']."</td>";
            echo "<td>".$book['isbn']."</td>";
            echo "<td><a href='viewbook.php"."&id=".$book['id'].
            "&operation=del' onclick= 'return confirm(\"Delete. Are your sure?\");'>Delete</a><br>
            <a href='update.php"."&id=".$book['id']."&title=".$book['title'].
            "&grade=".$book['author']."&semester=".$book['price']." '>Update</a></td>";
            echo "</tr>";
        } 
        echo "</table>";
        echo "<p align='center'><a href='insert.php'>Insert new book</a></p>";
 

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


  $conn = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>

</body>

</html>