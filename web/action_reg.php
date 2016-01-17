<?php 
  require_once("config.php");
$link = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("Connection Failed");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

  $fname = mysqli_real_escape_string($link,$_POST['fname']);
  $lname = mysqli_real_escape_string($link,$_POST['lname']);
  $pwd = mysqli_real_escape_string($link,$_POST['pwd']);
  $cpwd = mysqli_real_escape_string($link,$_POST['cpwd']);
  $address = mysqli_real_escape_string($link,$_POST['address']);
  $email = mysqli_real_escape_string($link,$_POST['email']);
  $cnum = mysqli_real_escape_string($link,$_POST['cnum']);

  
    $bool = true;


    function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

  if($pwd == $cpwd) { 
      $id = mysqli_query($link, "Select *  from users ORDER BY id DESC limit 1 "); //Query the users table
      $row = mysqli_fetch_array($id);
      

    $query = mysqli_query($link, "Select * from users"); //Query the users table

    while($row = mysqli_fetch_array($query)) //display all rows from query
    {
      $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
      if($email == $table_users) // checks if there are any matching fields
      {
        $bool = false; // sets bool to false
        Print '<script>alert("This email is already registered with us!");</script>'; //Prompts the user
        Print '<script>window.location.assign("register");</script>'; // redirects to register.php
      }
    }
    

    if($bool) // checks if bool is true
    {
      $hash = hashSSHA($pwd);
      $encrypted_password = $hash["encrypted"]; // encrypted password
      $salt = $hash["salt"];
      
      mysqli_query($link, "INSERT INTO users (uuid,fname, lname, password, salt, email, mobile, address) VALUES ('$uuid','$fname','$lname','$encrypted_password','$salt','$email','$cnum','$address')"); 
//Inserts the value to table count
      if (mysqli_affected_rows($link) == 1) {

                $message = "Register Successfull";

                         header("location: index.php");
                            }
                         else {
                              $bool = false; // sets bool to false
                              header("location: register.php");
                              }

                  }
        
      }


?>