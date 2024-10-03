 <?php
        session_start();
        include 'connection.php';

        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        
        $referer = $_SERVER['HTTP_REFERER'];

        // Taking all 5 values from the form data(input)
        $start_time = $_POST['start_time'];
        if(empty($start_time)){

             header("Location: $referer".'?error=Please enter start time. !');
                die;
        }
        $stop_time = $_POST['stop_time'];
        if(empty($stop_time)){

             header("Location: $referer".'?error=Please enter stop time. !');
                die;
        }
        $notes = mysqli_real_escape_string($conn, trim($_POST['notes']));
        if(empty($notes)){

             header("Location: $referer".'?error=Please notes. !');
                die;
        }
        $description = mysqli_real_escape_string($conn, trim($_POST['description']));
        if(empty($description)){

             header("Location: $referer".'?error=Please enter description. !');
                die;
        }

        
        
        $user_id = $_SESSION["user"]['id'];
       

        // We are going to insert the data into our sampleDB table
        $sql = "INSERT INTO task (start_time, stop_time, notes, description ,user_id) VALUES ('$start_time',
            '$stop_time','$notes','$description','$user_id')";

        // Check if the query is successful
        if(mysqli_query($conn, $sql)){
            
            $referer = $_SERVER['HTTP_REFERER'];
             header("Location: $referer".'?q=Task Created successfully !');
                die;


        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>