<?php include_once 'config.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@animxyz/core@0.1.1/dist/animxyz.min.css">
    <title>Sports City Manager</title>
</head>

<body>
    <?php include_once 'navbar.inc.php'?>
    <?php if (isset($_SESSION['response'])) {?>
      <div class="alert alert-<?=$_SESSION['res_type']?> alert-dismissible  show" role="alert">

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong><?=$_SESSION['response']?></strong>
        </div>
        <?php }
unset($_SESSION['response']);?>
        <section class="jumbotron text-center xyz-in" xyz="fade up big">
        <div class="container " >
          <h1 class="jumbotron-heading">Sport City Manager </h1>
          <p class="lead text-muted">.</p>
          <p>
          <?php
$query = "SELECT * FROM Clubs";
$stmt = $conn->prepare($query);
$stmt->execute();
$resultss = $stmt->get_result();
?>
          <form action="catSports.php" method="get" >
        <div class="form-group">
            <label>Sports</label>
            <select name="Sport" class="form-control">
                <option selected>Choose...</option>
                <?php while ($row2 = $resultss->fetch_assoc()) {?>
                <option value="<?=$row2['Sport']?>"><?=$row2['Sport']?></option>
                <?php }?>
            <div class="form-groupe">
            <input type="submit" name="Search" class="btn btn-primary btn-block" value="Search">
            </form>
          </p>
        </div>
      </section>
        <div class="album py-5 bg-light">
        <div  class=" container square-groupe" xyz="fade flip-up ">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow  square xyz-in">
                <a href="showclubs.php"><img class="card-img-top"  alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="Uploads/clubsl.jpeg" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Clubs</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow square xyz-in">
                <a href="showTrainers.php"><img class="card-img-top"  alt="Thumbnail [100%x225]" src="Uploads/trainer.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">Trainers</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>

                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow square xyz-in">
              <a href="showSportmans.php"><img class="card-img-top"  alt="Thumbnail [100%x225]" src="Uploads/sportman.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">Athletes</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>

                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow square xyz-in">
              <a href="ShowCom.php"><img class="card-img-top"  alt="Thumbnail [100%x225]" src="Uploads/compe.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">Competitions</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>

                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow square xyz-in">
              <a href="showfacilities.php"><img class="card-img-top"  alt="Thumbnail [100%x225]" src="Uploads/facilities.jpeg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">Facilities</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>

                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow square xyz-in">
              <img class="card-img-top"  alt="Thumbnail [100%x225]" src="Uploads/Supporters3.jpg" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                <div class="card-body">
                  <p class="card-text">Event</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>

                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <?php include_once 'footer.inc.php'?>

</body>

</html>