<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
       header("location: signin.php");
  }
?>
 <?php include_once "header.php"; ?>
     <body>
          <div class="wrapper">
               <section class="chat-area">
                    <header>
                         <?php
                         include_once "php/config.php";
                         $user_id= mysqli_real_escape_string($conn, $_GET['user_id']);
                         $sql= mysqli_query($conn, "SELECT * FROM users WHERE unique_id= {$user_id}");
                         if(mysqli_num_rows($sql) > 0){
                              $row= mysqli_fetch_assoc($sql);
                         }
                         ?>
                         <a href="users.php" class="back-icon"><i class="fa-solid fa-arrow-left"></i></a>
                         <img src="php/images/<?php echo $row['img']?>" alt="">
                         <div class="details">
                              <span><?php echo $row['usname'];?></span>
                              <p><?php echo $row['status']; ?></p>
                         </div>       
                    </header>  
                    <div class="chat-box">
                         <!-- <div class="chat-outgoing">
                              <div class="details">
                                   <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                   </p> 
                              </div>
                         </div>
                         <div class="chat-incoming">
                              <img src="ogpfp.jpg" alt="">
                              <div class="details">
                                   <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                   </p> 
                              </div>
                         </div> -->
                    </div>
                    <form action="#" class="typing-area" autocomplete="off">
                         <!--Using hidden inputs to send msg_sender_id and msg_receiver_id-->
                         <input type="text" name= "outgoing_id" value="<?php echo $_SESSION['unique_id'] ?>" hidden>
                         <input type="text" name= "incoming_id" value="<?php echo $user_id ?>" hidden>

                         <input type="text" name= "message" class= "input-field" placeholder="Type a message here....">
                         <button><i class="fa-solid fa-paper-plane"></i></button>
                    </form>  
               </section>
          </div>
          <script src="javascript/chat.js"></script>
     </body>
     <!-- ORE.A. ORIGINAL -->
</html>