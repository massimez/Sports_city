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
<?php include_once('config.php');
            $query="SELECT * FROM Competitions c  INNER JOIN Facilities f ON c.Place = f.ID_Facilitie  ";
            $stmt=$conn->prepare($query);
            $stmt->execute();
            $result=$stmt->get_result();
    ?>
    <h3 class="text-center text-dark">Competitions</h3>
<table class="table table-light">
        <thead>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Organisator</th>
                <th scope="col">Date</th>
                <th scope="col">Place</th>
                <th scope="col">Sport</th>
                <th scope="col">Level</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row=$result->fetch_assoc()){?>
            <tr>
                <th scope="row"><?= $row['ID_Competition'] ?></th>
                <td><?= $row['Organisator'] ?></td>
                <td><?= $row['Date'] ?></td>
                <td><?= $row['Name'] ?></td>
                <td><?= $row['Sport'] ?></td>
                <td><?= $row['Level'] ?></td>

                <td>
                    <a href="detailsCom.php?detailsCom=<?= $row['ID_Competition']; ?>" class="badge bg-info p-2">Details</a>
                    <a href="action.php?delete=<?= $row['ID_Sportman']; ?>" class="badge bg-danger p-2" onclick="return confirm('Sure ??')">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>