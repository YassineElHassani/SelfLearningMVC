

<div class="bg-white rounded-xl shadow-lg overflow-hidden mt-[35px]">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <?php

                        $crud = new Contact();
                        $contacts = $crud->displayContact(); 

                        foreach($contacts as $row) {
                            echo "
                            <tr class='hover:bg-gray-50 transition-colors duration-200'>
                                <td class='px-6 py-4 whitespace-nowrap'>
                                    <div class='flex items-center'>
                                        
                                        <div class='ml-4'>
                                            <div class='text-sm font-medium text-gray-900'>$row[name]</div>
                                        </div>
                                    </div>
                                </td>
                                <td class='px-6 py-4 whitespace-nowrap'>
                                    <div class='text-sm text-gray-500'>
                                        <i class='fas fa-envelope mr-2 text-gray-400'></i>
                                        $row[email]
                                    </div>
                                </td>
                                <td class='px-6 py-4 whitespace-nowrap'>
                                    <div class='text-sm text-gray-500'>
                                        <i class='fas fa-phone mr-2 text-gray-400'></i>
                                        $row[phone]
                                    </div>
                                </td>
                                <td class='px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3'>
                                    <a href='./index.php?id=$row[id]' class='inline-flex items-center text-indigo-600 hover:text-indigo-900 transition-colors duration-200'>
                                        <i class='fas fa-edit mr-1'></i> Edit
                                    </a>
                                    <a href='./index.php?delete=$row[id]' class='inline-flex items-center text-red-600 hover:text-red-900 transition-colors duration-200'>
                                        <i class='fas fa-trash-alt mr-1'></i> Delete
                                    </a>
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