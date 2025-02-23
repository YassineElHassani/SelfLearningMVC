<?php
require_once __DIR__.'/../models/config/Database.php';
require_once __DIR__.'/../models/Contact.php';

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

    header('location: ./home.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-lg mx-auto px-6">
        
        <div class="flex items-center justify-between py-6">
            <h1 class="text-3xl font-bold text-gray-800">✏️ Edit Contact</h1>
            <a href="./home.php" 
               class="px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg shadow-md hover:bg-gray-600 transition duration-200">
                ⬅ Back
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-6">
            <form class="space-y-6" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($contact['id']); ?>" />

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" required value="<?= htmlspecialchars($contact['name']); ?>"
                        class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" required value="<?= htmlspecialchars($contact['email']); ?>"
                        class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" name="phone" id="phone" required value="<?= htmlspecialchars($contact['phone']); ?>"
                        class="mt-1 w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>

                <div class="flex justify-end space-x-4 pt-4">
                    <button type="button" onclick="window.location.href='./home.php'" 
                        class="px-5 py-2 border rounded-lg bg-gray-300 text-gray-800 font-medium hover:bg-gray-400 transition">
                        Cancel
                    </button>
                    <button type="submit" id="submit" name="submit"
                        class="px-5 py-2 border rounded-lg bg-blue-600 text-white font-medium hover:bg-blue-700 transition">
                        💾 Save Changes
                    </button>
                </div>
            </form>
        </div>

    </div>
</body>
</html>