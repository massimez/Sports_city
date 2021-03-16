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
<?php
include_once('config.php');
            $query="SELECT * FROM Trainers  ";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();
    ?>
    <h3 class="text-center text-dark">Trainers</h3>
<table class="table table-light table-responsive-lg">
        <thead>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Birthday</th>
                <th scope="col">Adress</th>
                <th scope="col">Phone</th>
                <th scope="col">Qualification</th>
                <th scope="col">Categorie</th>
                <th scope="col">Club</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row=$result->fetch_assoc()){?>
            <tr>
                <th scope="row"><?= $row['ID_Trainer'] ?></th>
                <td><?= $row['Firstname'] ?></td>
                <td><?= $row['Lastname'] ?></td>
                <td><?= $row['Birthday'] ?></td>
                <td><?= $row['Address'] ?></td>
                <td><?= $row['Phone'] ?></td>
                <td><?= $row['Calification'] ?></td>
                <td><?= $row['Categorie'] ?></td>
                <td><?= $row['Club'] ?></td>
                <td>
                    <a href="detailstrainer.php?detailss=<?= $row['ID_Trainer']; ?>" class="badge bg-info p-2">Details</a>
                    <a href="action.php?delete=<?= $row['ID_Trainers']; ?>" class="badge bg-danger p-2" onclick="return confirm('Sure ??')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>