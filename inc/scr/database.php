<?php

//Defines the database connection variables.
$database_server = "localhost";
$database_username = "root";
$database_password = "password";
$database_name = "website";

//Connects to the database.
$database_connection = mysqli_connect($database_server, $database_username, $database_password, $database_name, "3306");

//Displays an error message.
if(!$database_connection){
    die("Connection failed:".mysqli_connect_error());
}

?>