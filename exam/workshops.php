<?php
include "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $WorkshopID = $_POST['WorkshopID'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $instructor_id = $_POST['instructor_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO workshops (WorkshopID, title, description, instructor_id, start_date, end_date, status) 
            VALUES ('$WorkshopID', '$title', '$description', '$instructor_id', '$start_date', '$end_date', '$status')";
    $result = $connection->query($sql);
    if ($result) {
        echo "Inserted Successfully";
        header("location:viewworkshops.php");
        exit();
    } else {
        echo "Insertion failed";
    }
}
?>
