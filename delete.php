<?php
session_start();
include_once 'config.php';
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $sql = "SELECT Photo FROM Sportmans WHERE ID_Sportman=?";
    $stmt2 = $conn->prepare($sql);
    $stmt2->bind_param("i", $id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $row = $result2->fetch_assoc();
    $imagepath = $row['Photo'];
    unlink($imagepath);

    $query = "DELETE  FROM Sportmans  WHERE ID_Sportman=? ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header('location:showSportmans.php');
    $_SESSION['response'] = "Successfully deleted";
    $_SESSION['res_type'] = "danger";
}
