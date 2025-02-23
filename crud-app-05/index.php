<?php

$url = $_GET['url'] ?? 'home';

switch ($url) {
    case 'contacts':
        require './views/home.php';
        break;
    case 'add':
        require './views/create.php';
        break;
    case 'edit':
        require './views/edit.php';
        break;
    case 'delete':
        require './views/delete.php';
        break;
    default:
        require './views/404.php';
        break;
}

?>