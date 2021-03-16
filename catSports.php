<?php include_once('action.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competitions</title>
</head>
<body>

<?php include_once('navbar.inc.php') ?>
<?php include_once('config.php'); ?>
<?php
            $query="SELECT * FROM Clubs";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();
        ?>
        <div class="justify-content-center align-items-center">
        <form action="catSports.php" method="get" class="col-lg-6 offset-lg-3" >
        <div class="form-group ">
            <select name="Sport" class="form-control">
            <option value="" >Click here to chose sport!!</option>
                <?php while($row=$result->fetch_assoc()){?>
                <option value="<?= $row['Sport'] ?>"><?= $row['Sport'] ?></option>  
                <?php } ?>
            <div class="form-groupe justify-content-center">
            <input type="submit" name="Search" class="btn btn-primary btn-block " value="Search">
            </form>
            </div>
                </div>
                </div>
    <h3 class="text-center text-dark"><?= $_GET['Sport']?></h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md6 mt-3 bg-info p-2 rounded ">
                <?php while($row2=$result2->fetch_assoc()){ ?>  
                <h2 class="bg-light p-2 rounded tect-center text-dark"> ID Club:<?= $row2['ID_Club'] ?> </h2>
                <h4 class="text-light">Club: <?= $row2['Club'] ?></h4>
                <h6 class="text-light">Trainer: <?= $row2['Lastname'] ?> <?= $row2['Firstname'] ?></h6>
                <h6 class="text-light">Club: <?= $row2['Club'] ?></h6>
                <hr/>
                <?php } ?> 
                <h4 class="text-dark">Competitions:</h4>
                <?php while($row3=$result3->fetch_assoc()){ ?>   
                    <h6 class="text-light">Organisator: <?= $row3['Organisator'] ?></h6>
                    <h6 class="text-light">Date: <?= $row3['Date'] ?></h6>
                    <h6 class="text-light">Name: <?= $row3['Name'] ?></h6>
                    <h6 class="text-light">Level: <?= $row3['Level'] ?></h6>
                <hr/>
                <?php } ?> 
            </div>
        </div>
    </div>
</body>
</html>