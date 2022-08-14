<?php
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
       header("location: signin.php");
  }
?>
<?php include_once "header.php"; ?>
     <body>
          <div class="wrapper">
               <section class="users">
                    <header>
                              <div class="content">
                                  <?php
                                    include_once "php/config.php";
                                    $query= "SELECT * FROM users WHERE unique_id= {$_SESSION['unique_id']}";
                                    $sql= mysqli_query($conn, $query);
                                    if(mysqli_num_rows($sql) > 0){
                                         $row= mysqli_fetch_assoc($sql);
                                    }
                                  ?>
                                   <img src="php/images/<?php echo $row['img']?>" alt="">
                                   <div class="details">
                                        <span><?php echo $row['usname'];?></span>
                                        <p><?php echo $row['status']; ?></p>
                                   </div>
                              </div>
                              <a href="php/signout.php?signout_id= <?php echo $row['unique_id']?>" class="logout">Logout</a>
                    </header>
                    <div class="search">
                         <span class="text">Select a user to chat</span>
                         <input type="text" placeholder="Enter name to search...">
                         <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="users-list">
                    </div>
               </section>

               <script src="javascript/users.js"></script>

          </div>
     </body>
     <!-- ORE.A. ORIGINAL -->
</html>