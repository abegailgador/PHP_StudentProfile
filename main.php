<?php
  $conn="";
  $sqlquery='';

  if(isset($_POST["submit"]))
  {
    $conn = mysqli_connect("localhost","root","");
    if(!$conn)
    {
      die("Connection Failed".mysqli_connect_error());
    }

    $sqlquery="create database ".$_POST["dbname"];
    if (mysqli_query($conn, $sqlquery)) {
      echo "database createed successfully";
    }
    else {
      echo "Database is already exist".mysqli_error($conn);
    }
    mysqli_close($conn);
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Database Using PHP Coding</title>
</head>
<body>
    <form method="post">
        <label>Database Name:</label>
        <input type="text" name="dbname" placeholder="Enter a new Database name">
        <input type="submit" name="submit">
    </form>
</body>
</html>