
<?php include_once('action.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competition Details</title>
</head>
<body>
<?php include_once('navbar.inc.php') ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md6 mt-3 bg-info p-2 rounded">
                <h2 class="bg-light p-2 rounded tect-center text-dark">ID: <?= $row['ID_Competition'] ?> </h2>
                <div class="text-center">
                    <img src="https://media.istockphoto.com/photos/winning-team-is-holding-trophy-in-hands-silhouettes-of-many-hands-in-picture-id961399110" width="300" height="300" alt="Image Competition">
                </div>
                <h4 class="text-light">Organisator: <?= $row['Organisator'] ?></h4>
                <h4 class="text-light">Date: <?= $row['Date'] ?></h4>
                <h4 class="text-light">Place: <?= $row['Name'] ?></h4>
                <h4 class="text-light">Sport: <?= $row['Sport'] ?></h4>
                <h4 class="text-light">Level: <?= $row['Level'] ?></h4>
                <h4 class="text-dark">Winner:</h4>
                <h4 class="text-light">ID:<?= $row3['ID_Sportman'] ?><?= $row3['Firstname'] ?>-<?= $row3['Lastname'] ?></h4>
                <h4 class="text-light">Club:<?= $row3['Club'] ?></h4>
                <h4 class="text-dark">Competitor:</h4>
                 <?php while($row2=$result2->fetch_assoc()){ ?>
                <h6 class="text-light">ID:<?= $row2['ID_Sportman'] ?>-<?= $row2['Firstname'] ?>-<?= $row2['Lastname'] ?></h6>
                <h6 class="text-light">Club:<?= $row3['Club'] ?></h6>
                <h6 class="text-light">Prize:<?= $row2['PRIZE'] ?></h6>
                <hr/>
                <?php } ?> 
            </div>
        </div>
    </div>
</body>
</html>