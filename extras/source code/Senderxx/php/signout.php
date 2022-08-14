<?php
     session_start();
     if(isset($_SESSION['unique_id'])){//if user is logged in then come to this page otherwise go to login page
          include_once "config.php";
          $signout_id= mysqli_real_escape_string($conn, $_GET['signout_id']);
          if(isset($signout_id)){//if signout id is set
               $status= "Offline now";
               //Updating status when user logs out
               $sql= mysqli_query($conn, "UPDATE users SET status= '{$status}' WHERE unique_id= {$signout_id}");
               if($sql){
                    session_unset();
                    session_destroy();
                    header("location: ../signin.php");
               }
          }else{
               header("location: ../users.php");
          }
     }else{
          header("location: ../signin.php");
     }
?>