<?php
include 'connection.php';

// Dodavanje leta
if (isset($_POST['dodaj'])) {
    $datum = $_POST['datum'];
    $vreme = $_POST['vreme'];
    $destinacija = $_POST['destinacija'];

    $sql = "INSERT INTO let (datum, vreme, destinacija) VALUES ('$datum', '$vreme', '$destinacija')";
    if ($conn->query($sql) === TRUE) {
        echo "Let je uspešno dodat.";
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
}

// Izmena leta
if (isset($_POST['izmeni'])) {
    $let_id = $_POST['let_id'];
    $datum = $_POST['datum'];
    $vreme = $_POST['vreme'];
    $destinacija = $_POST['destinacija'];

    $sql = "UPDATE let SET datum='$datum', vreme='$vreme', destinacija='$destinacija' WHERE let_id=$let_id";
    if ($conn->query($sql) === TRUE) {
        echo "Let je uspešno izmenjen.";
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
}

// Brisanje leta
if (isset($_POST['obrisi'])) {
    $let_id = $_POST['let_id'];

    $sql = "DELETE FROM let WHERE let_id=$let_id";
    if ($conn->query($sql) === TRUE) {
        echo "Let je uspešno obrisan.";
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
}

// Prikaz svih letova
$sql = "SELECT * FROM let";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Upravljanje Letovima</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Upravljanje Letovima</h1>

    <form method="post" action="">
        <h2>Dodaj Let</h2>
        Datum: <input type="date" name="datum" required><br>
        Vreme: <input type="time" name="vreme" required><br>
        Destinacija: <input type="text" name="destinacija" required><br>
        <button type="submit" name="dodaj">Dodaj Let</button>
    </form>

    <h2>Izmeni ili Obriši Let</h2>
    <table border="1">
        <tr>
            <th>ID Leta</th>
            <th>Datum</th>
            <th>Vreme</th>
            <th>Destinacija</th>
            <th>Izmena</th>
            <th>Brisanje</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <form method="post" action="">
                <td><?php echo $row['let_id']; ?></td>
                <td><input type="date" name="datum" value="<?php echo $row['datum']; ?>" required></td>
                <td><input type="time" name="vreme" value="<?php echo $row['vreme']; ?>" required></td>
                <td><input type="text" name="destinacija" value="<?php echo $row['destinacija']; ?>" required></td>
                <td>
                    <input type="hidden" name="let_id" value="<?php echo $row['let_id']; ?>">
                    <button type="submit" name="izmeni">Izmeni</button>
                </td>
                <td>
                    <input type="hidden" name="let_id" value="<?php echo $row['let_id']; ?>">
                    <button type="submit" name="obrisi" onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj let?');">Obriši</button>
                </td>
            </form>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
