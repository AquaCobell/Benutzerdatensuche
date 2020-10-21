<!doctype html>
<html lang = "en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Benutzerdaten anzeigen</title>

    <script type="text/javascript" src="js/functions.js"></script>


</head>
<body>

<div class="container">


    <h1 class = "mt-5 mb-3">Benutzerdaten anzeigen</h1>

    <?php


   require "lib/data.php";

    //VAR
    $filter = "";
    $data = [];


    // Formularverarbeitung (HTTP POST Request)
    if (isset($_POST['submit'])) {

        // double-check: zuerst pruefen ob die Daten im Request enthalten sein, dann auslesen
        $filter = isset($_POST['filter']) ? $_POST['filter'] : ""; //check if not null
        $data = getFilterdData($filter);
    } else {
            //$data = getAllData();
        }

        ?>


    <div class="input-group">
        <form action="index.php" method="post" class="form-inline m-2">
            <label for="filter" class="mr-2">Suche:</label>
            <input  type="text"
                    id="filter"
                    name="filter"
                    class="form-control pl-2 pr-2"
                    maxlength="25"
                    value="<?= htmlspecialchars($filter)?>"
            />
            <input type="submit" name="submit" class="btn btn-primary ml-2" value="Suchen"/>
        </form>
        <form action="index.php" method="get" class="mt-2">
            <input type="submit" class="btn btn-secondary" value="Leeren"/>
        </form>
    </div>

    <table class="table table-striped users">
        <tbody>
        <tr>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Geburtsdatum</th>
        </tr>
        <?php
        if (sizeof($data)==0){
            echo "<tr class='alert alert-dark><td colspan='3'>Keine Einträge gefunden</td></tr>";
        }
        foreach ($data as $row) {
            ?>
            <tr>
                <td><a href="details.php?id=<?= $row['id'] ?>"><?=$row['firstname']. " ". $row['lastname'] ?></a>
                </td>
                <td><?= $row['email'] ?></td>
                <td><?= formDate($row['birthdate']) ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>
</body>
</html>