<?php
require_once __DIR__.'/models/Database.php';
require_once __DIR__.'/models/Contact.php';

$id = intval($_GET['id']);

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $edit = new Contact();
    $contact = $edit->getContact($id);
}

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $update = new Contact();
    $update->updateContact($id, $name, $email, $phone);

    header('location: ./index.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edie Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 sm:flex sm:items-center sm:justify-between">
            <h1 class="text-2xl font-bold text-gray-900">Edit Contact</h1>
            <div class="mt-4 sm:mt-0">
                <a href="./index.php" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Back to List
                </a>
            </div>
        </div>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <form class="p-6 space-y-6" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($contact['id']); ?>" />
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="<?= htmlspecialchars($contact['name']); ?>" required 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="<?= htmlspecialchars($contact['email']); ?>" required 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="tel" name="phone" id="phone" value="<?= htmlspecialchars($contact['phone']); ?>" required 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="window.location.href='./index.php'" 
                        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit" id="submit" name="submit"
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save Contact
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>