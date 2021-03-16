
<?php include_once 'action.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$row['Firstname']?> <?=$row['Lastname']?></title>
</head>
<body>
<?php include_once 'navbar.inc.php'?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md6 mt-3 bg-info p-2 rounded">
                <h2 class="bg-light p-2 rounded tect-center text-dark">Athlete ID: <?=$row['ID_Sportman']?> </h2>
                <h2 class="bg-light p-2 rounded tect-center text-dark">Name: <?=$row['Firstname']?> <?=$row['Lastname']?></h2>
                <div class="text-center">
                    <img src="<?=$row['Photo']?>" width="300" height="300" alt="Image atleths">
                </div>
                <h4 class="text-light">Birthday: <?=$row['Birthday']?></h4>
                <h4 class="text-light">Email: <?=$row['Email']?></h4>
                <h4 class="text-light">Phone: <?=$row['Phone']?></h4>
                <h4 class="text-light">Address: <?=$row['Address']?></h4>
                <h4 class="text-light">Club name: <?=$row['Club']?></h4>
                <h4 class="text-light">Sport: <?=$row['Sport']?></h4>
                <h4 class="text-light">Trainer: <?=$row['TRF']?>-<?=$row['TRL']?></h4>
                <h4 class="text-dark">Competitions:</h4>
                 <?php while ($row2 = $result2->fetch_assoc()) {?>
                <h6 class="text-light">Competition ID:<?=$row2['ID_Competition']?></h6>
                <h6 class="text-light">Organisator:<?=$row2['Organisator']?></h6>
                <h6 class="text-light">Date:<?=$row2['Date']?></h6>
                <h6 class="text-light">Competition Level:<?=$row2['Level']?></h6>
                <h6 class="text-light">Prize(Classment):<?=$row2['PRIZE']?></h6>
                <hr/>
                <?php }?>
            </div>
        </div>
    </div>
</body>
</html>