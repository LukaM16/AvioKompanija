<?php

      session_start();
      if (!isset($_SESSION['admin_id'])) {
          die(header("Location: index.php?error=2"));
      }



      include "php/connection.php";

        $sql = "SELECT * FROM `let`";
        $run = $conn->query($sql);

        if ($run) {
            $letovi = $run->fetch_all(MYSQLI_ASSOC);
        } else {
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
                <li class="nav-item">
    <button onclick="window.location.href='php/letovi.php';">Dodaj let</button>
    </li>
    

            </ul>
        </div>
    </nav>



    <div class="conatiner">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
              <div class="naslov bg-dark ">Spisak svih letova</div>
                <table class="table table-dark">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Vreme</th>
                            <th scope="col">Destinacija</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($letovi as $let): ?>
                  
                        <tr>
                            <th scope="row"><?php echo $let['let_id'];?></th>
                            <td><?php echo $let['datum'];?></td>
                            <td><?php echo $let['vreme'];?></td>
                            <td><?php echo $let['destinacija'];?></td>
                            <td>

                                <form action="pregled_leta.php" method="GET">
                                    <input type="hidden" name="let_id"
                                        value="<?php echo $let['let_id'] ?>">
                                    <button type="submit" class="btn btn-light">Pregled</button>
                                </form>



                            </td>
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