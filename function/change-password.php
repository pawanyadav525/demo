 <?php

        include 'connection.php';
        session_start();
     
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }


        $password = $_POST['password'];

        if(empty($password)){

             header("Location: $referer".'?error=Please enter password. !');
                die;
        }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

         if(!empty($_SESSION["user"])){

             $user_id = $_SESSION["user"]['id'];
             $date = date('Y-m-d H:i:s');

             $sql = "UPDATE users SET password='$password' , last_change_password='$date' WHERE id=".$user_id;
           
            if(mysqli_query($conn,$sql)){
               

              $sql1 = "UPDATE users SET last_login='$date' WHERE id=".$user_id;
              mysqli_query($conn, $sql1);

              header("Location: /admin-panel/");
              exit();


            } else {
              echo "Error updating record: " . mysqli_error($conn);
            }


         }else{

           header("Location: /admin-panel/login.php");
           exit();

         }
        

      
 
 mysqli_close($conn);
        ?>