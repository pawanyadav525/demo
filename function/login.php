 <?php

        include 'connection.php';
        session_start();
     
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        $referer = $_SERVER['HTTP_REFERER'];

        $email = $_POST['email'];
        $password = $_POST['password'];
        if(empty($email)){
          
             header("Location: $referer".'?error=Please enter username. !');
                die;
        }

        if(empty($password)){

             header("Location: $referer".'?error=Please enter password. !');
                die;
        }
        

       // Prepare the SQL statement (to avoid SQL injection)
        $sql = "SELECT * FROM users WHERE email = ?"; // Assuming 'users' is the table name

        $stmt = mysqli_prepare($conn, $sql);

        // Bind the email parameter to the prepared statement
        mysqli_stmt_bind_param($stmt, "s", $email); // "s" denotes the type (string)

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // Step 3: Fetch the record
        if ($row = mysqli_fetch_assoc($result)) {

           // Check if the password matches the hashed password in the database
            if (password_verify($password, $row['password'])) {


                if($row['user_type'] ==1){
                    session_unset(); 
                    //start admin session
                    $_SESSION["admin"] = $row;
                    header("Location: /admin-panel");
                    exit();

                }else{
                   
                   if(!empty($row['last_change_password'])){

                    $now = time(); 
                    $your_date = strtotime($row['last_change_password']);
                    $daysdiff = ceil(($now - $your_date)/86400);
                     
                     if($daysdiff >=30){
                        header("Location: /admin-panel/change-password.php");
                        exit();
                     }else{

                        session_unset();
                        $_SESSION["user"] = $row;

                        header("Location: /admin-panel");
                        exit();

                     }
                  

                  }else{
                    header("Location: /admin-panel/change-password.php");
                    exit();
                   }
                    // start user session
                    session_unset();
                    $_SESSION["user"] = $row;
                    header("Location: /admin-panel");
                    exit();

                }
                


            } else {
                $msg = "Invalid username or password.";
                header("Location: $referer".'?error='.$msg);
                die;
            }


        } else {
            // No record found
            $msg = "Invalid username or password.";
            header("Location: $referer".'?error='.$msg);
                die;
            
        }
 
 mysqli_close($conn);
        ?>