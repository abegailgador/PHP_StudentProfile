<?php
  function OpenCon()
  {
    $dbhost = "localhost";
    $dbuser = "uspfstudent";
    $dbpass = "1234567";
    $conn = new mysqli($dbhost, $dbuser, $dbpass) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
  }
  
  function DbCon($db)
  {
    $dbhost = "localhost";
    $dbuser = "uspfstudent";
    $dbpass = "1234567";
    $dbconn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $dbconn -> error);
    
    return $dbconn;
  }

  function CloseCon($conn)
  {
    $conn -> close();
  }

  if(isset($_POST["submit"]))
  {
    $conn = OpenCon();

    $dbname = "schooldb";

    if($conn)
    {
      $sqlquery="create database ".$dbname;
      if (mysqli_query($conn, $sqlquery)) {
        echo $dbname." created successfully<br>";
        $dbconn = DbCon($dbname);
        if($dbconn) {
          echo "connected to ".$dbname." successfully<br>";
          $create_table = "CREATE TABLE studenttable (
            id bigint (20) UNSIGNED NOT NULL AUTO_INCREMENT,
            student_id varchar (20) NOT NULL,
            family_name varchar (20) NOT NULL,
            first_name varchar (50) NOT NULL,
            middle_name varchar (20) NOT NULL,
            email_address varchar (100) NOT NULL,
            home_address varchar (200) NOT NULL,
            mobile_number varchar (50) NOT NULL,
            course varchar (50) NOT NULL,
            PRIMARY KEY (id))";
          
          if (mysqli_query($dbconn, $create_table)) {
            echo "studenttable successtully created <br>";

            $student_id = $_POST['student_id'];
            $family_name = $_POST['family_name'];
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $email_address = $_POST['email_address'];
            $home_address = $_POST['home_address'];
            $mobile_number = $_POST['mobile_number'];
            $course = $_POST['course'];
            $insert_data = "INSERT INTO studenttable (student_id,family_name,first_name,middle_name,email_address,home_address,mobile_number,course)
            VALUES ('$student_id','$family_name','$first_name','$middle_name','$email_address','$home_address','$mobile_number','$course')";
            if (mysqli_query($dbconn, $insert_data)) {
              echo "New record created successfully !";
            } else {
              echo "Error: " . $insert_data . " " . mysqli_error($conn);
            }
          }
        }
        else {
          echo "Did not established successful connection with ".$dbname;
        }
      }
      else {
        echo $dbname." already exists<br>";
        $dbconn = DbCon($dbname);
        if($dbconn) {
          echo "connected to ".$dbname." successfully<br>";
          $create_table = "CREATE TABLE studenttable (
            id bigint (20) UNSIGNED NOT NULL AUTO_INCREMENT,
            student_id varchar (20) NOT NULL,
            family_name varchar (20) NOT NULL,
            first_name varchar (50) NOT NULL,
            middle_name varchar (20) NOT NULL,
            email_address varchar (100) NOT NULL,
            home_address varchar (200) NOT NULL,
            mobile_number varchar (50) NOT NULL,
            course varchar (50) NOT NULL,
            PRIMARY KEY (id))";
          
          if (mysqli_query($dbconn, $create_table)) {
            echo "studenttable successtully created <br>";

            $student_id = $_POST['student_id'];
            $family_name = $_POST['family_name'];
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $email_address = $_POST['email_address'];
            $home_address = $_POST['home_address'];
            $mobile_number = $_POST['mobile_number'];
            $course = $_POST['course'];
            $insert_data = "INSERT INTO studenttable (student_id,family_name,first_name,middle_name,email_address,home_address,mobile_number,course)
            VALUES ('$student_id','$family_name','$first_name','$middle_name','$email_address','$home_address','$mobile_number','$course')";
            if (mysqli_query($dbconn, $insert_data)) {
              echo "New record created successfully !";
            } else {
              echo "Error: " . $insert_data . " " . mysqli_error($conn);
            }
          }
        }
        else {
          echo "Did not established successful connection with ".$dbname;
        }
      }
    }
    mysqli_close($conn);
    mysqli_close($dbconn);
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Database Using PHP Coding</title>
</head>
<body>
    <form method="post">
      <label>Student ID:</label>
      <input type="text" name="student_id"><br>
      <label>Family Name:</label>
      <input type="text" name="family_name"><br>
      <label>First Name:</label>
      <input type="text" name="first_name"><br>
      <label>Middle Name:</label>
      <input type="text" name="middle_name"><br>
      <label>Email Address:</label>
      <input type="text" name="email_address"><br>
      <label>Home Address:</label>
      <input type="text" name="home_address"><br>
      <label>Mobile Number:</label>
      <input type="text" name="mobile_number"><br>
      <label>Course:</label>
      <input type="text" name="course"><br>
      <input type="submit" name="submit">
    </form>
</body>
</html>