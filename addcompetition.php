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
    <title>Add Competition</title>
</head>

<body>
    <?php include_once('navbar.inc.php') ?>
    <h2>Add Competition</h2>
    <form action="action.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="Organisator" class="form-control" placeholder="Name organisator" required>
        </div>
        <div class="form-group">
            <input type="date" name="Date" class="form-control"  required>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Level" id="inlineRadio1" value="Division_1">
        <label class="form-check-label" for="inlineRadio1">Division I</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Level" id="inlineRadio2" value="Division_2">
        <label class="form-check-label" for="inlineRadio2">Division II</label>
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="Level" id="inlineRadio3" value="Division_3" >
        <label class="form-check-label" for="inlineRadio3">Division III</label>
        </div>
        <?php
            $query="SELECT * FROM Facilities";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();
        ?>
        
        <div class="form-group">
            <label>Place</label>
            <select name="Place" class="form-control">
                <option selected>Choose...</option>
                <?php while($row=$result->fetch_assoc()){?>
                <option value="<?= $row['ID_Facilitie'] ?>"><?= $row['Name'] ?>/Address=<?= $row['Address'] ?>/Capacity=<?= $row['Capacity'] ?></option>  
                <?php } ?>
            </select>

        </div>
        <?php
            $query2="SELECT * FROM Spots";
            $stmt2=$conn->prepare($query2);
            $stmt2->execute();
            $result2=$stmt2->get_result();
        ?>
        <div class="form-group">
            <label>Sports</label>
            <select name="Sport" class="form-control">
                <option  value="">Choose...</option>
                <?php while($row=$result2->fetch_assoc()){?>
                <option value="<?= $row['Sport'] ?>"><?= $row['Sport'] ?></option>  
                <?php } ?>
            </select>

        </div>
        
        <div class="form-groupe">
            <input type="submit" name="AddCom" class="btn btn-primary btn-block " value="AddCom">
            </div>
    </form>
</body>

</html>