<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud-App-01</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 sm:flex sm:items-center sm:justify-between">
            <h1 class="text-2xl font-bold text-gray-900">Contacts</h1>
            <div class="mt-4 sm:mt-0">
                <a href="./create.php" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    Create Contact
                </a>
            </div>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <?php 
                        require_once __DIR__.'/models/Database.php';
                        require_once __DIR__.'/models/Contact.php';

                        $crud = new Contact();
                        $contacts = $crud->displayContact(); 

                        foreach($contacts as $row) {
                            echo "
                            <tr>
                                <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>$row[name]</td>
                                <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>$row[email]</td>
                                <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>$row[phone]</td>
                                <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>
                                    <a href='./edit.php?id=$row[id]' class='text-indigo-600 hover:text-indigo-900 mr-3'>Edit</a>
                                    <a href='./delete.php?id=$row[id]' class='text-red-600 hover:text-red-900'>Delete</a>
                                </td>
                            </tr>
                            ";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>