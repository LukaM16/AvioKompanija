<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "aviokompanija";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error){
    die("Greška prilikom povezivanja sa bazom podataka: " . $conn->connect_error);
}
?>    

