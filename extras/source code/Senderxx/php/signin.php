<?php
    session_start();
    include_once "config.php";
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);
    
    if(!empty($email) && !empty($password)){
         //Checking if user info is matched with any database row
         $sql= mysqli_query($conn, "SELECT * FROM users WHERE email= '{$email}' AND password= '{$password}'");
         if(mysqli_num_rows($sql) > 0){//if user credentials match
          $row= mysqli_fetch_assoc($sql);
          $status= "Active now";
          $sql2= mysqli_query($conn, "UPDATE users SET status= '{$status}' WHERE unique_id= {$row['unique_id']}");
          if($sql2){
               $_SESSION['unique_id']= $row['unique_id']; //using this session I used user unique_id in other php file
               echo "Success";
          }
         }else{
          echo "Email or Password is incorrect";
         }
    }else{
         echo "All input fields are required!";
    }
?>