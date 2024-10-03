 <?php

        include 'connection.php';

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        
        $referer = $_SERVER['HTTP_REFERER'];

        // Taking all 5 values from the form data(input)
        $fname = mysqli_real_escape_string($conn, trim($_POST['fname']));
        if(empty($fname)){

             header("Location: $referer".'?error=Please enter first name. !');
                die;
        }
        $lname = mysqli_real_escape_string($conn, trim($_POST['lname']));
        if(empty($lname)){

             header("Location: $referer".'?error=Please enter last name. !');
                die;
        }
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        if(empty($email)){

             header("Location: $referer".'?error=Please enter email. !');
                die;
        }
        $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
        if(empty($phone)){

             header("Location: $referer".'?error=Please enter phone number. !');
                die;
        }

        if(empty($_POST['password'])){

             header("Location: $referer".'?error=Please password. !');
                die;
        }
        
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
    

        // We are going to insert the data into our sampleDB table
        $sql = "INSERT INTO users (fname, lname, email, phone , password ,user_type) VALUES ('$fname',
            '$lname','$email','$phone','$password','2')";

        // Check if the query is successful
        if(mysqli_query($conn, $sql)){
            
            $referer = $_SERVER['HTTP_REFERER'];
             header("Location: $referer".'?q=User Created successfully !');
                die;


        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>