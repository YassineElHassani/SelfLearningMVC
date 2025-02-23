<?php
require_once __DIR__.'/../models/config/Database.php';
require_once __DIR__.'/../models/Contact.php';

$id = intval($_GET['id']);

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $delete = new Contact();
    $delete->deleteContact($id);

    header('location: ./home.php');
    exit;
}
?>