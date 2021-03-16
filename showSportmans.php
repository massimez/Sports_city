<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competitions</title>
</head>
<body>
<?php include_once 'config.php'?>

    <?php include_once 'navbar.inc.php'?>

<h3 class="text-center text-dark">Athletes</h3>
    <?php if (isset($_SESSION['response'])) {?>
      <div class="alert alert-<?=$_SESSION['res_type']?> alert-dismissible fade show" role="alert">

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong><?=$_SESSION['response']?></strong>
        </div>
        <?php }
unset($_SESSION['response']);?>
    <?php
$query = "SELECT * FROM Sportmans INNER JOIN Sportman_Sports ON Sportmans.ID_Sportman = Sportman_Sports.ID_Sportman INNER JOIN Clubs ON Sportman_Sports.Club = Clubs.club";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
?>
            <?php if (isset($_SESSION['response'])) {?>
        <div class="alert alert-<?=$_SESSION['res_type'];?> alert-dismissible text-center">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <b><?=$_SESSION['response'];?></b>
        </div>
        <?php }
unset($_SESSION['response']);?>
    <table class="table table-light table-responsive">
        <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col"></th>
                <th scope="col">Fristname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Club</th>
                <th scope="col">Sport</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) {?>
            <tr>
                <th scope="row"><?=$row['ID_Sportman']?></th>
                <td><img src="<?=$row['Photo']?>" width="25"></td>
                <td><?=$row['Firstname']?></td>
                <td><?=$row['Lastname']?></td>
                <td><?=$row['Email']?></td>
                <td><?=$row['Phone']?></td>
                <td><?=$row['Address']?></td>
                <td><?=$row['Club']?></td>
                <td><?=$row['Sport']?></td>
                <td>
                    <a href="details.php?details=<?=$row['ID_Sportman'];?>" class="badge bg-info p-2">Details</a>
                    <a href="delete.php?delete=<?=$row['ID_Sportman'];?>" class="badge bg-danger p-2" onclick="return confirm('Sure ??')">Delete</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>