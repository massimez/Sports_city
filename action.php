<?php
session_start();
include_once 'config.php';
if (isset($_POST['Add'])) {
    $firstname = $_POST['Fristname'];
    $lastname = $_POST['Lastname'];
    $bdate = $_POST['Birthday'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $avatar = $_FILES['image']['name'];
    $upload = "Uploads/" . $avatar;
    $Clubname = $_POST['Club'];

    $query = "INSERT INTO Sportmans(Firstname,Lastname,Birthday,Address,Phone,Email,Photo)VALUES(?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssss", $firstname, $lastname, $bdate, $address, $phone, $email, $upload);
    $stmt->execute();

    move_uploaded_file($_FILES['image']['tmp_name'], $upload);
    //Club
    $latest_id = $conn->insert_id;
    $query2 = "INSERT INTO Sportman_Sports(ID_Sportman,Club)VALUES(?,?)";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("is", $latest_id, $Clubname);
    $stmt2->execute();
    $_SESSION['response'] = "Successfully Insreted to the database";
    $_SESSION['res_type'] = "success";
    header('location:showSportmans.php');
}

if (isset($_POST['AddCom'])) {
    $name = $_POST['Organisator'];
    $date = $_POST['Date'];
    $place = $_POST['Place'];
    $Level = $_POST['Level'];
    $Sport = $_POST['Sport'];

    $query3 = "INSERT INTO Competitions(Organisator,Date,Place,Sport,Level)VALUES(?,?,?,?,?)";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param("ssiss", $name, $date, $place, $Sport, $Level);
    $stmt3->execute();

    $_SESSION['response'] = "Successfully Insreted to the database";
    $_SESSION['res_type'] = "success";
    header('location:ShowCom.php');
}
if (isset($_POST['AddTrainer'])) {
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $bdate = $_POST['Birthday'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $address = $_POST['Address'];
    $Clubname = $_POST['Club'];
    $Categorie = $_POST['Categorie'];
    $Qualification = $_POST['Qualification'];

    $query4 = "INSERT INTO Trainers(Lastname,Firstname,Birthday,Address,Phone,Calification,Categorie,Club)VALUES(?,?,?,?,?,?,?,?)";
    $stmt4 = $conn->prepare($query4);
    $stmt4->bind_param("ssssssss", $lastname, $firstname, $bdate, $address, $phone, $Qualification, $Categorie, $Clubname);
    $stmt4->execute();

    $_SESSION['response'] = "Successfully Insreted to the database";
    $_SESSION['res_type'] = "success";
    header('location:showTrainers.php');
}

if (isset($_GET['details'])) {
    $id = $_GET['details'];
    $query = "SELECT Sportmans.Photo ,Sportmans.ID_Sportman	,Sportmans.Firstname	,Sportmans.Lastname	,Sportmans.Birthday	,Sportmans.Email,Sportmans.Phone ,Sportmans.Address , Clubs.Club,Clubs.Sport , tr.Lastname AS TRF, tr.Firstname AS TRL FROM Sportmans INNER JOIN Sportman_Sports ON Sportmans.ID_Sportman = Sportman_Sports.ID_Sportman
        INNER JOIN Clubs ON Sportman_Sports.Club = Clubs.Club INNER JOIN Trainers tr ON Clubs.Club = tr.Club
        WHERE Sportmans.ID_Sportman=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $query2 = "SELECT * FROM Sportmans s INNER JOIN Competitor c ON s.ID_Sportman = c.ID_Sportman INNER JOIN Sportman_Sports ss ON s.ID_Sportman = ss.ID_Sportman
         INNER JOIN Competitions  ON c.ID_Competition = Competitions.ID_Competition
        WHERE s.ID_Sportman =? ";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

}
if (isset($_GET['detailss'])) {
    $id = $_GET['detailss'];
    $query = "SELECT * FROM Trainers t INNER JOIN Clubs c ON t.Club = c.Club
        WHERE ID_Trainer=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $query2 = "SELECT * FROM Trainers INNER JOIN Sportman_Trainers ON Trainers.ID_Trainer = Sportman_Trainers.ID_Trainer
        INNER JOIN Sportmans ON Sportman_Trainers.ID_Sportman = Sportmans.ID_Sportman
        WHERE Trainers.ID_Trainer=?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row2 = $result2->fetch_assoc();
}
if (isset($_GET['detailsCom'])) {
    $id = $_GET['detailsCom'];
    $query = "SELECT *  FROM Competitions c  INNER JOIN Facilities f ON c.Place = f.ID_Facilitie WHERE ID_Competition=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $query2 = "SELECT * FROM Sportmans s INNER JOIN Competitor c ON s.ID_Sportman = c.ID_Sportman INNER JOIN Sportman_Sports ss ON s.ID_Sportman = ss.ID_Sportman
        INNER JOIN Competitions  ON c.ID_Competition = Competitions.ID_Competition
       WHERE Competitions.ID_Competition=?
       ORDER BY c.PRIZE DESC";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    $query3 = "SELECT * FROM Sportmans s INNER JOIN Competitor c ON s.ID_Sportman = c.ID_Sportman INNER JOIN Sportman_Sports ss ON s.ID_Sportman = ss.ID_Sportman
        INNER JOIN Competitions  ON c.ID_Competition = Competitions.ID_Competition
       WHERE c.PRIZE='First' AND Competitions.ID_Competition=?
       ";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param("i", $id);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $row3 = $result3->fetch_assoc();

}
if (isset($_GET['detailsclub'])) {
    $id = $_GET['detailsclub'];
    $query = "SELECT *  FROM Clubs c  INNER JOIN Trainers f ON c.Club = f.Club WHERE c.ID_Club=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $query2 = "SELECT * FROM Sportmans s INNER JOIN Sportman_Sports ss ON s.ID_Sportman = ss.ID_Sportman INNER JOIN Clubs c ON ss.Club = c.Club
        INNER JOIN Competitor com ON s.ID_Sportman = com.ID_Sportman INNER JOIN Competitions co ON com.ID_Competition = co.ID_Competition
        WHERE c.ID_Club = ?
       ";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("i", $id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    $query3 = "SELECT * FROM Sportmans s INNER JOIN Competitor c ON s.ID_Sportman = c.ID_Sportman INNER JOIN Sportman_Sports ss ON s.ID_Sportman = ss.ID_Sportman
        INNER JOIN Competitions  ON c.ID_Competition = Competitions.ID_Competition
       WHERE c.PRIZE='First' AND Competitions.ID_Competition=?
       ";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param("i", $id);
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    $row3 = $result3->fetch_assoc();

}

if (isset($_GET['Search'])) {
    $id = $_GET['Sport'];
    $query2 = "SELECT *  FROM Clubs c  INNER JOIN Trainers f ON c.Club = f.Club WHERE c.Sport=?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->bind_param("s", $id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    $query3 = "SELECT * FROM Competitions c  INNER JOIN Facilities f ON c.Place = f.ID_Facilitie  WHERE c.Sport=?";
    $stmt3 = $conn->prepare($query3);
    $stmt3->bind_param("s", $id);
    $stmt3->execute();
    $result3 = $stmt3->get_result();

}
