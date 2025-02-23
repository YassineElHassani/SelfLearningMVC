<?php
require_once __DIR__.'/models/Database.php';
require_once __DIR__.'/models/Contact.php';


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    
    if ($id > 0) {
        $delete = new Contact();
        $delete->deleteContact($id);
        header('Location: ./index.php');
        exit;
    }
}


include './views/header.php';
include './views/form.php';
include './views/list.php';
include './views/footer.php';

?>