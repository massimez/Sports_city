
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
                <h2 class="bg-light p-2 rounded text-center text-dark">Trainer ID: <?=$row['ID_Trainer']?> </h2>
                <h2 class="bg-light p-2 rounded text-center text-dark">Name: <?=$row['Firstname']?> <?=$row['Lastname']?></h2>
                <div class="text-center">
                    <img src="https://www.academyoffitnessprofessionals.com/wp-content/uploads/2016/02/personal-trainer-salary.jpg" width="300" height="300" alt="Image atleths">
                </div>
                <h4 class="text-light">Birthday: <?=$row['Birthday']?></h4>
                <h4 class="text-light">Phone: <?=$row['Phone']?></h4>
                <h4 class="text-light">Address: <?=$row['Address']?></h4>
                <h4 class="text-light">Club name: <?=$row['Club']?></h4>
                <h4 class="text-light">Sport: <?=$row['Sport']?></h4>
                <h4 class="text-light">Calification: <?=$row['Calification']?> </h4>
                <h4 class="text-light">Categorie: <?=$row['Categorie']?> </h4>
                <h4 class="text-light">Level: <?=$row['Club']?> </h4>
                <h4 class="text-light">Athlete ID: <?=$row2['ID_Sportman']?> </h4>
                <hr/>
            </div>
        </div>
    </div>
</body>
</html>