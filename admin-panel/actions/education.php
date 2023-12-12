<?php

include('../../includes/connect.php');
$institution = str_replace("'", "\'", $_POST['institution']);
$study_field = str_replace("'", "\'", $_POST['study_field']);
$graduation_year = str_replace("'", "\'", $_POST['graduation_year']);
$user_id =  $_SESSION['user_id'];

$id = isset($_POST['id']) ? $_POST['id'] : null;

if (isset($_POST['add'])) {
    $insertEmployee = "INSERT INTO education (`institution`, `study_field`, `graduation_year`, `user_id`) VALUES (:institution, :study_field, :graduation_year, :user_id)";
    try {
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':institution', $institution, PDO::PARAM_STR);
        $stmt->bindParam(':study_field', $study_field, PDO::PARAM_STR);
        $stmt->bindParam(':graduation_year', $graduation_year, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();

        echo "Employee added successfully!";
        $_SESSION['success_add'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['update'])) {
    $id = $_POST['primaryId'];

    // Update query
    $updateEmployee = "UPDATE education SET institution = :institution, study_field = :study_field, graduation_year = :graduation_year, user_id = :user_id WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($updateEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':institution', $institution, PDO::PARAM_STR);
        $stmt->bindParam(':study_field', $study_field, PDO::PARAM_STR);
        $stmt->bindParam(':graduation_year', $graduation_year, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        $stmt->execute();

        echo "Employee updated successfully!";
        $_SESSION['success_update'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['delete'])) {
    // Delete query
    $deleteEmployee = "DELETE FROM education WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($deleteEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Employee deleted successfully!";
        $_SESSION['success_delete'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
}

// Close the connection
$database->pdo = null;

header("location:" . $_SERVER['HTTP_REFERER']);
?>
