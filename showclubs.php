<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
</head>
<body>
<?php include_once('navbar.inc.php') ?>
<?php
include_once('config.php');
            $query="SELECT * FROM Clubs   ";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();

    ?>
    <h3 class="text-center text-dark">Clubs</h3>
<table class="table table-light table-responsive-lg">
        <thead>
            <tr class="table-primary">
                <th scope="col">ID:</th>
                <th scope="col">Club name:</th>
                <th scope="col">Sport:</th>
                <th scope="col">Action:</th>

            </tr>
        </thead>
        <tbody>
        <?php while($row=$result->fetch_assoc()){?>
            <tr>
                <th scope="row"><?= $row['ID_Club'] ?></th>
                <td><?= $row['Club'] ?></td>
                <td><?= $row['Sport'] ?></td>
  
                <td>
                    <a href="detailsclub.php?detailsclub=<?= $row['ID_Club']; ?>" class="badge bg-info p-2">Details</a>
                    <a href="action.php?delete=<?= $row['ID_Trainers']; ?>" class="badge bg-danger p-2" onclick="return confirm('Sure ??')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>