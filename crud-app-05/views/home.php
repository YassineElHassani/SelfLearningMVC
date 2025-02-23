<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-6xl mx-auto px-6">
        
        <div class="flex items-center justify-between py-6">
            <h1 class="text-3xl font-bold text-gray-800">📇 Contact Manager</h1>
            <a href="./create.php" 
               class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                ➕ Add Contact
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-sm font-semibold">Name</th>
                        <th class="px-6 py-3 text-sm font-semibold">Email</th>
                        <th class="px-6 py-3 text-sm font-semibold">Phone</th>
                        <th class="px-6 py-3 text-sm font-semibold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <?php 
                        require_once __DIR__.'/../models/config/Database.php';
                        require_once __DIR__.'/../models/Contact.php';

                        $crud = new Contact();
                        $contacts = $crud->displayContact(); 

                        foreach($contacts as $row) {
                            echo "
                            <tr class='hover:bg-gray-50 transition'>
                                <td class='px-6 py-4 text-gray-700 font-medium'>$row[name]</td>
                                <td class='px-6 py-4 text-gray-500'>$row[email]</td>
                                <td class='px-6 py-4 text-gray-500'>$row[phone]</td>
                                <td class='px-6 py-4 text-center'>
                                    <a href='./edit.php?id=$row[id]' 
                                       class='text-blue-500 hover:text-blue-700 font-medium mr-4'>✏️ Edit</a>
                                    <a href='./delete.php?id=$row[id]' 
                                       class='text-red-500 hover:text-red-700 font-medium'>🗑 Delete</a>
                                </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
