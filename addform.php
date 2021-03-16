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
    <title>Add Sportman</title>
</head>

<body>
    <?php include_once('navbar.inc.php') ?>
    <h2>Add Sportman</h2>
    <form action="action.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="Fristname" class="form-control" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <input type="text" name="Lastname" class="form-control" placeholder="Enter name" required>
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
        <div class="form-group">
            <label>Add an avatar</label>
            <input type="file" name="image" class="form-control" id="costumFile">
        </div>
        <div class="form-groupe">
            <input type="submit" name="Add" class="btn btn-primary btn-block" value="Add">
    </form>
</body>

</html>