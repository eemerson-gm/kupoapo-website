<?php

//Defines the error messages.
$error_header   = "Location: ";
$error_webpage  = $error_header."../signup.php";
$error_username = "&username=";
$error_empty    = $error_webpage."?signup=empty".$error_username;
$error_sql      = $error_webpage."?signup=sql".$error_username;
$error_invalid  = $error_webpage."?signup=invalid".$error_username;
$error_password = $error_webpage."?signup=password".$error_username;
$error_taken    = $error_webpage."?signup=taken".$error_username;
$error_success  = $error_header." ../posts.php?signup=success";

if (isset($_POST['submit'])){

    require 'database.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password2'];

    if (empty($username) || empty($password) || empty($password_confirm)){
        header($error_empty.$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header($error_invalid.$username);
        exit();
    }
    else if ($password !== $password_confirm){
        header($error_password.$username);
        exit();
    }
    else{
        $sql_command = "SELECT user_name FROM users WHERE user_name = ?";
        $sql_statement = mysqli_stmt_init($database_connection);

        if(!mysqli_stmt_prepare($sql_statement, $sql_command)){
            header($error_sql.$username);
            exit();
        }
        else{
            mysqli_stmt_bind_param($sql_statement,"s", $username);
            mysqli_stmt_execute($sql_statement);
            mysqli_stmt_store_result($sql_statement);
            $results = mysqli_stmt_num_rows($sql_statement);

            if($results > 0){
                header($error_taken.$username);
                exit();
            }
            else{
                $sql_command = "INSERT INTO users (user_name, user_password) VALUES (?, ?)";
                $sql_statement = mysqli_stmt_init($database_connection);

                if(!mysqli_stmt_prepare($sql_statement, $sql_command)){
                    header($error_sql.$username);
                    exit();
                }
                else{
                    $hash_password = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($sql_statement,"ss", $username, $hash_password);
                    mysqli_stmt_execute($sql_statement);
                    mysqli_stmt_store_result($sql_statement);
                    header($error_success);
                }
            }
        }
    }
    mysqli_stmt_close($sql_statement);
    mysqli_close($database_connection);
}
else{
    header($error_webpage);
    exit();
}

?>