<?php

//Defines the database connection variables.
$database_server = "localhost";
$database_username = "u791866351_kupoapo";
$database_password = "3?Vr|?9f";
$database_name = "u791866351_Main";

//Connects to the database.
$database_connection = mysqli_connect($database_server, $database_username, $database_password, $database_name, "3306");

//Displays an error message.
if(!$database_connection){
    die("Connection failed:".mysqli_connect_error());
}

?>