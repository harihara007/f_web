<?php
	session_start();
require_once("config.php");
$link = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("Connection Failed");
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    $email= mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $bool = true;

    $query = mysqli_query($link, "Select * from users WHERE email='$email'"); // Query the users table
    $exists = mysqli_num_rows($query); //Checks if email exists
    $table_users = "";
    $table_password = "";
    $username = "";
    $uuid = "";


    function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

    if($exists > 0) //IF there are no returning rows or no existing username
    {
       while($row = mysqli_fetch_array($query)) // display all rows from query
       {
          $table_users = $row['email']; // the first username row is passed on to $table_users, and so on until the query is finished
          $encrypted_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
          $username = $row['fname'];
          $salt = $row['salt'];
          $uuid = $row['uuid'];
          $table_password = checkhashSSHA($salt, $password);
       }
       if(($email== $table_users))// checks if there are any matching fields
       {
         
              if($encrypted_password == $table_password)
              {
                 $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
                 $_SESSION['writer'] = $uuid;
                 header("location: index.php"); // redirects the user to the authenticated home page
              }
              else
              {
                Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
                Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
              }
          
        


        }
        else
        {
            Print '<script>alert("Incorrect email!");</script>'; // Prompts the user
           Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
        }
    }
    else
      {
        Print '<script>alert("User not found");</script>'; // Prompts the user
        Print '<script>window.location.assign("register.php");</script>'; // redirects to login.php
      }
?>