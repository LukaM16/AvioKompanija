<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
</head>
<body>
<style>
        img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 40px;
        }
    </style>
    <div class="bg" id="bg1">
    <div class="container">
    <img src="./img/logo.jpg" alt="logo" width="300px">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Registracija korisnika</h5>

                <form action="php/obrada_registracije.php" method="post">

                <div class="form-group">
                    <label for="ime">Ime</label>
                    <input type="text" class="form-control" id="ime" name="ime" placeholder="Unesite ime" required>
                </div>

                <div class="form-group">
                    <label for="prezime">Prezime</label>
                    <input type="text" class="form-control" id="prezime" name="prezime" placeholder="Unesite prezime" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail adresa</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Unesite e-mail" required>
                </div>

                <div class="form-group">
                    <label for="lozinka">Lozinka</label>
                    <input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="Unesite lozinku" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Registrujte se</button>
                <style>
                    button {
                        margin-top: 10px;
                    }
                    </style>

                </form>

                <div class="text-center mt-3">
                    <a href="index.php">Već imate nalog? Prijavite se!</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>