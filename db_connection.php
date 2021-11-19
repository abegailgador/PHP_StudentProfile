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
?>