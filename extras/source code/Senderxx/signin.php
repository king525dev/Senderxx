<?php
     session_start();
     if(isset($_SESSION['unique_id'])){//if user is logged in
          header("location: users.php");
     }
 ?>
 <?php include_once "header.php"; ?>
     <body>
          <div class="wrapper">
               <section class="form signin">
                    <header class="title">Senderxx</header>
                    <form action="">
                         <div class="error-txt"></div>
                         <div class="field input">
                              <label>Email Address</label>
                              <input type="text" name="email" placeholder="Enter your Email Address">
                         </div><div class="field input">
                              <label>Password</label>
                              <input type="password" name="password" placeholder="Enter your Password">
                              <i class="fa-solid fa-eye"></i>
                         <div class="field button">
                              <input type="submit" value="Continue to Chat">
                         </div>
                         <div class="link">Don't have an account? <a href="index.php">Signup now!</a></div>
                    </form>
               </section>
          </div>

          <script src="javascript\pass-show-hide.js"></script>
          <script src="javascript\signin.js"></script>

     </body>
     <!-- ORE.A. ORIGINAL -->
</html>