<?php
    session_start();
     if(isset($_SESSION['unique_id'])){//if user is logged in
          header("location: users.php");
     }
 ?>
 <?php include_once "header.php"; ?>
     <body>
          <div class="wrapper">
               <section class="form signup">
                    <header class="title">Senderxx</header>
                    <form action="#" enctype="multipart/form-data">
                         <div class="error-txt">This is an error msg</div>
                         <div class="name-details">
                              <div class="field input">
                                   <label>First Name</label>
                                   <input type="text" name="fname" placeholder="First name" required>
                              </div>
                              <div class="field input">
                                   <label>Last Name</label>
                                   <input type="text" name="lname" placeholder="Last name" required>
                              </div>
                         </div>
                         <div class="field input">
                              <label>Username</label>
                              <input type="text" name="usname" placeholder="Enter your Display name" required>
                         </div>
                         <div class="field input">
                              <label>Email Address</label>
                              <input type="text" name="email" placeholder="Enter your Email Address" required>
                         </div><div class="field input">
                              <label>Password</label>
                              <input type="password" name="password" placeholder="Enter your Password" required>
                              <i class="fa-solid fa-eye"></i>
                         </div><div class="field image"> 
                              <label>Select Profile Picture</label>
                              <input type="file" name="image" required>
                         </div>
                         <div class="field button">
                              <input type="submit" value="Continue to Chat">
                         </div>
                         <div class="link">Already Signed Up? <a href="signin.php">Login now!</a></div>
                    </form>
               </section>
          </div>

          <script src="javascript\pass-show-hide.js"></script>
          <script src="javascript\signup.js"></script>

     </body>
     <!-- ORE.A. ORIGINAL -->
</html>