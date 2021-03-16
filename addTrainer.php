<!DOCTYPE html>
<html lang="en">
<?php
  include 'action.php';
  include 'config.php';
?>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Trainer</title>
</head>

<body>
    <?php include_once('navbar.inc.php') ?>
    <h2>Add Trainer</h2>
    <form action="action.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="Firstname" class="form-control" placeholder="Enter Fristname" required>
        </div>
        <div class="form-group">
            <input type="text" name="Lastname" class="form-control" placeholder="Enter Lastname" required>
        </div>
        <div class="form-group">
            <input type="date" name="Birthday" class="form-control"  required>
        </div>
        <div class="form-group">
            <input type="email" name="Email" class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="form-group">
            <input type="tel" name="Phone" class="form-control" placeholder="Phone" required>
        </div>
        <div class="form-group">
            <input type="text" name="Address" class="form-control" placeholder="Enter Address" required>
        </div>
        <label>Qualification:</label>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Qualification" id="inlineRadio1" value="Low">
        <label class="form-check-label" for="inlineRadio1">Low</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Qualification" id="inlineRadio2" value="Med">
        <label class="form-check-label" for="inlineRadio2">Med</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Qualification" id="inlineRadio3" value="High" >
        <label class="form-check-label" for="inlineRadio3">High</label>
        </div>
        <label>Categorie:</label>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Categorie" id="inlineRadio1" value="First">
        <label class="form-check-label" for="inlineRadio1">First</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Categorie" id="inlineRadio2" value="Second">
        <label class="form-check-label" for="inlineRadio2">Second</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Categorie" id="inlineRadio3" value="Third" >
        <label class="form-check-label" for="inlineRadio3">Third</label>
        </div>
        <?php
            $query="SELECT * FROM Clubs";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();
        ?>
        
        <div class="form-group">
            <label>Clubs</label>
            <select name="Club" class="form-control">
                <option selected>Choose...</option>
                <?php while($row=$result->fetch_assoc()){?>
                <option value="<?= $row['Club'] ?>"><?= $row['Club'] ?>-<?= $row['Sport'] ?></option>  
                <?php } ?>
            </select>

    </div>
        <div class="form-groupe">
            <input type="submit" name="AddTrainer" class="btn btn-primary btn-block" value="Add">
    </form>
</body>

</html>