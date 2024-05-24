<?php

        session_start();
        if (!isset($_SESSION['admin_id'])) {
            die(header("Location: index.php?error=2"));
        }

      include "php/connection.php";




        
        if (isset($_GET['let_id'])) {
            $let_id = $_GET['let_id'];
        
            $sql = "SELECT * FROM putnik WHERE let_id = $let_id";
            $result = $conn->query($sql);
        
            if ($result) {
                $putnici = $result->fetch_all(MYSQLI_ASSOC);
            }

            
        } else {

            echo "Nije prosleđen ID proizvoda.";

        }


        $sql = "SELECT * FROM let WHERE let_id = $let_id";
        $result2 = $conn->query($sql);

        if ($result2) {
            $let = $result2->fetch_assoc();
        }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">
            <a class="navbar-brand" href="homepage.php">
                <img src="img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
                Avio
            </a>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link text-danger" href="php/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="conatiner">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class='naslov bg-dark'>Spisak putnika za let <?php echo $let['destinacija'];?> (<?php echo $let['datum'];?>)</div>
                <table class="table table-dark">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ime</th>
                            <th scope="col">Prezime</th>
                            <th scope="col">Prtljag</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($putnici as $putnik): ?>
                  
                        <tr>
                            <th scope="row"><?php echo $putnik['putnik_id'];?></th>
                            <td><?php echo $putnik['ime'];?></td>
                            <td><?php echo $putnik['prezime'];?></td>
                            <td><?php echo $putnik['prtljag'];?></td>

                        </tr>

                    <?php endforeach; ?>
                    </tbody>
          
                </table>
            </div>
            <div class="col-2"></div>

        </div>


    </div>
</body>

</html>