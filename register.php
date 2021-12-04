<?php
 include('connection.php');



// REGISTER USER

  // receive all input values from the form
  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
  $address = mysqli_real_escape_string($con, $_POST['address']);


  if ($password != $cpassword) {
    echo "<h1><center> Password does not match </center></h1>"; 
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_array($result,MYSQLI_ASSOC);  
  
  if ($user) { // if user exists
    echo "<h1><center> Users already exits </center></h1>"; 
   
  }else{
    // $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO users (id,fname, email, password,address) 
              VALUES('$fname', '$email', '$password','$address')";
    $result2=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result2);  
    // if($result)
    // {
    //   header('location: index.php');
    // }
    if($count==1)
    {
        echo "<h1><center> Registered </center></h1>";
    }
     
  }
  

  
