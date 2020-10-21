<?php
require "lib/data.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;
$data = getDataperID($id);

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Benutzerdetails</title>

    <script type="text/javascript" src="js/functions.js"></script>
</head>
<body onload="initialize()">
<div class="container">

    <h1 class="mt-5 mb-3">Benutzerdetails</h1>

    <a href="index.php" class="btn btn-link mb-3">zurück</a>
    <?php
    if ($data == null){
        echo "<p class='alert alert-danger'>Benutzer nicht gefunden</p>";
    }else {
        ?>
        <table class="table">
            <tbody>
            <tr>
                <td>Vorname</td>
                <td><?= $data['firstname'] ?></td>
            </tr>
            <tr>
                <td>Nachname</td>
                <td><?= $data['lastname'] ?></td>
            </tr>
            <tr>
                <td>Geburtsdatum</td>
                <td><?= $data['birthdate'] ?></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td><?= $data['email'] ?></td>
            </tr>
            <tr>
                <td>Telefon</td>
                <td><?= $data['phone'] ?></td>
            </tr>
            <tr>
                <td>Straße</td>
                <td><?= $data['street'] ?></td>
            </tr>
            </tbody>
        </table>
        <?php
    }
     ?>
</body>
</html>