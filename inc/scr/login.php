<?php

//Defines the error messages.
$error_header   = "Location: ";
$error_webpage  = $error_header."../projects.php";
$error_username = "&username=";
$error_empty    = $error_webpage."?login=empty".$error_username;
$error_sql      = $error_webpage."?login=sql".$error_username;
$error_invalid  = $error_webpage."?login=invalid".$error_username;
$error_success  = $error_webpage."?login=success";

if (isset($_POST['submit'])){

    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)){
        header($error_empty.$username);
        exit();
    }
    else{
        $sql_command = "SELECT * FROM users WHERE user_name = ?";
        $sql_statement = mysqli_stmt_init($database_connection);

        if(!mysqli_stmt_prepare($sql_statement, $sql_command)){
            header($error_sql.$username);
            exit();
        }
        else{
            mysqli_stmt_bind_param($sql_statement, "s", $username);
            mysqli_stmt_execute($sql_statement);
            $result = mysqli_stmt_get_result($sql_statement);
            if ($row = mysqli_fetch_assoc($result)){
                $password_check = password_verify($password, $row['user_password']);
                if($password_check == false){
                    header($error_invalid.$username);
                    exit();
                }
                else if ($password_check == true){
                    session_start();
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];

                    header($error_success);
                    exit();
                }
                else{
                    header($error_invalid.$username);
                    exit();
                }
            }
            else{
                header($error_invalid.$username);
                exit();
            }
        }
    }

}
else{
    header($error_webpage);
    exit();
}