<?php include_once 'action.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$row['Club']?>-Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@animxyz/core@0.1.1/dist/animxyz.min.css">
</head>
<body>
<?php include_once 'navbar.inc.php'?>
    <div class="container xyz-in" xyz="fade up big" >
        <div class="row justify-content-center xyz-in" xyz="fade up big">
            <div class="col-md6 mt-3 bg-info p-2 rounded">
                <h2 class="bg-light p-2 rounded tect-center text-dark"> <?=$row['Club']?> </h2>
                <div class="text-center">
                    <img src="https://media.istockphoto.com/photos/winning-team-is-holding-trophy-in-hands-silhouettes-of-many-hands-in-picture-id961399110" width="300" height="300" alt="Image Competition">
                </div>
                <h4 class="text-light">Sport: <?=$row['Sport']?></h4>
                <h4 class="text-light">Trainer: <?=$row['Lastname']?> <?=$row['Firstname']?></h4>

                <?php
$query4 = "SELECT  COUNT(*) AS CNT FROM Sportmans s INNER JOIN Sportman_Sports ss ON s.ID_Sportman = ss.ID_Sportman
                                                    INNER JOIN Clubs c ON ss.Club = c.Club
                                                    INNER JOIN Competitor com ON s.ID_Sportman = com.ID_Sportman
                                                    WHERE c.ID_Club = ? AND com.PRIZE='First' GROUP BY c.ID_Club";
$id = $_GET['detailsclub'];
$stmt4 = $conn->prepare($query4);
$stmt4->bind_param("i", $id);
$stmt4->execute();
$result4 = $stmt4->get_result();
$row4 = $result4->fetch_assoc();
?>
                <h4 class="text-light">Competition won total:<?php if ($row4['CNT'] > 0) {
    echo $row4['CNT'];
} else {echo "0";}?></h4>
                <h4 class="text-dark">Athletes: </h4>
                 <?php while ($row2 = $result2->fetch_assoc()) {?>
                <h6 class="text-light">Athlete ID:<?=$row2['ID_Sportman']?>-<?=$row2['Firstname']?>-<?=$row2['Lastname']?></h6>
                <h6 class="text-light">Prize:<?php if ($row2['PRIZE']) {
    echo $row2['PRIZE'];
} else {echo "0";}?></h4></h6>
                <h6 class="text-light">Date competition: <?=$row2['Date']?></h6>
                <hr/>
                <?php }?>

            </div>
        </div>
    </div>
</body>
</html>