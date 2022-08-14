<?php
    session_start();
    include_once "config.php";
    $fname= mysqli_real_escape_string($conn, $_POST['fname']);
    $lname= mysqli_real_escape_string($conn, $_POST['lname']);
    $usname= mysqli_real_escape_string($conn, $_POST['usname']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($usname) && !empty($email) && !empty($password)){
        //Checking if email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){//if email is valid
            //checking if email is already in database
            $sql= mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){ //if mail already exist
                echo "$email - already exist!";
            }else{
                //Checking user upload file or not
                if(isset($_FILES['image'])){ //If file is uploaded
                    $img_name= $_FILES['image']['name']; //getting user uploaed img name
                    //$img_type= $_FILES['image']['type']; //getting user uploaded img type
                    $tmp_name= $_FILES['image']['tmp_name']; //this temporary name is used to save/move file in the folder

                    //Exploding image and getting the last extension like jpg, png etc.
                    $img_explode= explode(".", $img_name);
                    $img_ext= end($img_explode); //here we get the extension of an user uploaded img file

                    $extentions= ['png', 'jpeg', 'jpg']; //these are some valid img ext and we've stored them in array
                    if(in_array($img_ext, $extentions) === true){//if user uploaded any valid ext according to $extentions
                        $time= time(); //this will return current time (to be used as a unique name given to imgs){{
                        //Moving the uploaded img to the folder
                        $new_image_name= $time.$img_name;
                        
                        if(move_uploaded_file($tmp_name, "images/".$new_image_name)){//if user uploaded img transfer's successfully
                            $status= "Active Now";//Once user signs up, status will be active
                            $random_id= rand(time(), 10000000);//creting random id for user

                            //inserting all user data inside table
                            $sql2= mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, usname, email, password, img, status)
                                                VALUES ({$random_id}, '{$fname}', '{$lname}', '{$usname}', '{$email}', '{$password}', '{$new_image_name}', '{$status}')");
                            if($sql2){//if these data inserted
                               $sql3= mysqli_query($conn, "SELECT *FROM users WHERE email= '{$email}'");
                               if(mysqli_num_rows($sql3) > 0){
                                   $row= mysqli_fetch_assoc($sql3);
                                   $_SESSION['unique_id']= $row['unique_id']; //using this session I used user unique_id in other php file
                                   echo "Success";
                               }
                            }else{
                                echo "Something went wrong :(";
                            }                 
                        }
                    }else{
                        echo "Please Select a Valid Image File with extention \n [png, jpeg, jpg]";
                    }

                }else{
                    echo "Please Select an Image File";
                }
            }
        }else{
            echo "$email - This is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>