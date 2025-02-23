<?php
require_once './db.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn->query("DELETE FROM contacts WHERE id = $id");

    header('location: ./index.php');
    exit;
}
?>