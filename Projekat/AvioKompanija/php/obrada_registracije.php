<?php
include "connection.php";

$ime=$_REQUEST['ime'];
$prezime=$_REQUEST['prezime'];
$email=$_REQUEST['email'];
$password=$_REQUEST['lozinka'];

echo ($ime);
echo ($prezime);
echo ($email);
echo ($password);


$password_hash = md5($password);

$sql = "SELECT email FROM `admin` WHERE email = '$email'";
$email_result = $conn->query($sql);
$row = $email_result->num_rows;

if($row > 0 )
{
    die(header("Location: ../register.php?error=2"));
}

$sql ="INSERT INTO admin(ime, prezime, email, sifra) VALUES (?,?,?,?)";
$run=$conn->prepare($sql);
$run->bind_param("ssss",$ime,$prezime,$email,$password_hash);
$run -> execute();

if($run){
    header("Location: ../index.php?success=1");
}
else
{
    die(header("Location: ../register.php?error=3"));
}

    
?>