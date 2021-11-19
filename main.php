<?php
  include 'db_connection.php';

  if(isset($_POST["submit"]))
  {
    $db_count = 0;
    $table_count = 0;

    $dbname = "schooldb";

    $student_id = $_POST['student_id'];
    $family_name = $_POST['family_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $email_address = $_POST['email_address'];
    $home_address = $_POST['home_address'];
    $mobile_number = $_POST['mobile_number'];
    $course = $_POST['course'];

    if ($db_count==0) 
    {
      $conn = OpenCon();
      $sqlquery="create database ".$dbname;
      mysqli_query($conn, $sqlquery);                                                       // create schooldb
      mysqli_close($conn);
      $db_count++;
    } 

    if ($table_count==0)
    {
      $table_count++;
      $dbconn = DbCon($dbname);
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
      mysqli_query($dbconn, $create_table);                                                 // create studenttable
    }

    
    $insert_data = "INSERT INTO studenttable (student_id,family_name,first_name,middle_name,email_address,home_address,mobile_number,course)
    VALUES ('$student_id','$family_name','$first_name','$middle_name','$email_address','$home_address','$mobile_number','$course')";
    
    if (mysqli_query($dbconn, $insert_data))                                                // add new data in studenttable
    {
      echo "<p style='color: #00ca00; text-align: center'>".$student_id." ".$family_name.", ".$first_name." recorded successfully!</p>";
    } else {
      echo "Error: " . $insert_data . " " . mysqli_error($dbconn);
    }
    
    mysqli_close($dbconn);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Information</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <form method="post">
    <ul class="form-style-1">
      <h1>Student Information</h1>
      <li>
        <label>Full Name <span class="required">*</span></label>
        <input type="text" name="family_name" class="field-divided" placeholder="Last" /> 
        <input type="text" name="first_name" class="field-divided" placeholder="First" />
        <input type="text" name="middle_name" class="field-divided" placeholder="Middle" />
      <li>
          <label>Student ID <span class="required">*</span></label>
          <input type="text" name="student_id" class="field-long" />
      </li>
      <li>
          <label>Course <span class="required">*</span></label>
          <input type="text" name="course" class="field-long" />
      </li>
      <li>
          <label>Mobile Number <span class="required">*</span></label>
          <input type="text" name="mobile_number" class="field-long" />
      </li>
      <li>
          <label>Email Address <span class="required">*</span></label>
          <input type="email" name="email_address" class="field-long" />
      </li>
      <li>
          <label>Home Address <span class="required">*</span></label>
          <textarea name="home_address" id="field5" class="field-long field-textarea"></textarea>
      </li>
      <li>
          <input type="submit" name="submit" />
      </li>
    </ul>
  </form>
</body>
</html>