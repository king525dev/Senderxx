<?php
     session_start();
     if(isset($_SESSION['unique_id'])){
          include_once "config.php";
          $outgoing_id= mysqli_real_escape_string($conn, $_POST['outgoing_id']);
          $incoming_id= mysqli_real_escape_string($conn, $_POST['incoming_id']);
          $output= "";

          $sql= "SELECT * FROM messages
                 LEFT JOIN users on users.unique_id= messages.outgoing_msg_id
                 WHERE (outgoing_msg_id= {$outgoing_id} AND incoming_msg_id= {$incoming_id}) 
                 OR (outgoing_msg_id= {$incoming_id} AND incoming_msg_id= {$outgoing_id}) ORDER BY msg_id ASC";
          $query= mysqli_query($conn, $sql);
          if(mysqli_num_rows($query) > 0){
               while($row= mysqli_fetch_assoc($query)){//sqli_fetch_assoc turns result to an array of strings
                    if($row['outgoing_msg_id'] === $outgoing_id){//if this is true, the current user is a msg sender
                         $output .= '<div class="chat-outgoing">
                                        <div class="details">
                                             <p>'. $row['msg'] .'</p> 
                                        </div>
                                     </div>';
                    }else{//current user is a receiver
                         $output .= '<div class="chat-incoming">
                                     <img src="php/images/'. $row['img'] .'" alt="">
                                        <div class="details">
                                             <p>'. $row['msg'] .'</p> 
                                        </div>
                                     </div>';
                    }
               }
               echo $output;
          }
     }else{
          header("../signin.php");
     }
?>