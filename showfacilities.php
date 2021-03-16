<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Facilities</title>
</head>
<body>
<?php include_once('navbar.inc.php') ?>
<?php include_once('config.php');
            $query="SELECT * FROM Facilities f  ";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();
    ?>
    <h3 class="text-center text-dark">Sport Facilities</h3>
<table class="table table-light">
        <thead>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Type</th>
                <th scope="col">Capacity</th>
                <th scope="col">Opned date</th>
                <th scope="col">Administrator</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row=$result->fetch_assoc()){?>
            <tr>
                <th scope="row"><?= $row['ID_Facilitie'] ?></th>
                <td><?= $row['Name'] ?></td>
                <td><?= $row['Address'] ?></td>
                <td><?= $row['Type'] ?></td>
                <td><?= $row['Capacity'] ?></td>
                <td><?= $row['Opned_date'] ?></td>
                <td><?= $row['Administrator'] ?></td>

                <td>
                    <a href="detailsCom.php?detailsFac=<?= $row['ID_Facilities']; ?>" class="badge bg-info p-2">Details</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>