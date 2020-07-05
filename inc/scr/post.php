<?php

    //Includes the sql database.
    include('database.php');

    //Gets the file and form information.
    $project_title      = $_POST['title'];
    $project_tinyinfo   = $_POST['tinyinfo'];
    $project_longinfo   = $_POST['longinfo'];
    $project_language   = $_POST['language'];
    $project_team       = (int)$_POST['team'];
    $project_time       = (int)$_POST['time'];
    $project_date       = $_POST['date'];
    $project_type       = isset($_POST['type']);
    $project_complete   = isset($_POST['complete']);
    $project_submit     = $_POST['submit'];

    //Gets the file information.
    $file1_name = $_FILES['image1']['name'];
    $file1_size = $_FILES['image1']['size'];
    $file1_temp = $_FILES['image1']['tmp_name'];
    $file1_type = $_FILES['image1']['type'];
    $file1_path = "../../img/previews/".$file1_name;
    $file1_extn = strtolower(end(explode('.', $file1_name)));

    //Gets the file information.
    $file2_name = $_FILES['image2']['name'];
    $file2_size = $_FILES['image2']['size'];
    $file2_temp = $_FILES['image2']['tmp_name'];
    $file2_type = $_FILES['image2']['type'];
    $file2_path = "../../img/previews/".$file2_name;
    $file2_extn = strtolower(end(explode('.', $file2_name)));

    //Gets the file information.
    $file3_name = $_FILES['image3']['name'];
    $file3_size = $_FILES['image3']['size'];
    $file3_temp = $_FILES['image3']['tmp_name'];
    $file3_type = $_FILES['image3']['type'];
    $file3_path = "../../img/previews/".$file3_name;
    $file3_extn = strtolower(end(explode('.', $file3_name)));

    //Gets an array of extensions.
    $file_array = array("jpeg", "jpg", "png");

    //Checks if the file was submitted properly.
    if(isset($project_submit)){

        echo 'submitted';
        
        //Checks if the file is the correct size.
        if(($file1_size <= 2097152) && ($file2_size <= 2097152) && ($file3_size <= 2097152)){

            echo 'good size';

            //Checks if the file extension is correct.
            if(in_array($file1_extn, $file_array) && in_array($file2_extn, $file_array) && in_array($file3_extn, $file_array)){

                echo 'good type';

                //Checks the size of the image.
                if((getimagesize($file1_temp) !== false) && (getimagesize($file2_temp) !== false) && (getimagesize($file3_temp) !== false)){

                    echo 'is an image';

                    //Attempts to upload the file.
                    if(move_uploaded_file($file1_temp, $file1_path) && move_uploaded_file($file2_temp, $file2_path) && move_uploaded_file($file3_temp, $file3_path)){

                        echo 'upload sucess';

                        //Creates the sql statement and command.
                        $sql_command = "INSERT INTO projects (project_title, project_image1, project_image2, project_image3, project_tinyinfo, project_longinfo, project_language, project_complete, project_team, project_type, project_time, project_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $sql_statement = mysqli_stmt_init($database_connection);

                        //Prepares the statement for sql storage.
                        if(!mysqli_stmt_prepare($sql_statement, $sql_command)){
                            echo 'failed statement';
                            exit();
                        }
                        else{
                            $file_path = "img/previews/".$file_name;
                            mysqli_stmt_bind_param($sql_statement,"sssssssiiiis", $project_title, $file1_path, $file2_path, $file3_path, $project_tinyinfo, $project_longinfo, $project_language, $project_complete, $project_team, $project_type, $project_time,  $project_date);
                            mysqli_stmt_execute($sql_statement);
                            mysqli_stmt_store_result($sql_statement);
                        }

                    }else{
                        echo 'File Error.';
                        exit();
                    }

                }

            }

        }
    }

?>