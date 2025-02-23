<?php

$model = new Contact();
$contact = null;
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $contact = $model->getContact($id);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if ($name && $email && $phone) { 
        if ($id > 0) {
            $model->updateContact($id, $name, $email, $phone);
        } else {
            $model->createContact($name, $email, $phone);
        }
        header('Location: ./index.php');
        exit;
    }
}
?>



<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <form class="p-8 space-y-6" method="post">
        <div class="grid grid-cols-1 gap-6">
            <input type="hidden" name="id" value="<?= $id; ?>" />

            <div class="relative group">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-user mr-2 text-blue-600"></i>Name
                </label>
                <input type="text" name="name" id="name" required value="<?= htmlspecialchars($contact['name'] ?? ''); ?>"
                    class="block w-full border border-gray-300 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
            </div>

            <div class="relative group">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-envelope mr-2 text-blue-600"></i>Email
                </label>
                <input type="email" name="email" id="email" required value="<?= htmlspecialchars($contact['email'] ?? ''); ?>"
                    class="block w-full border border-gray-300 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
            </div>

            <div class="relative group">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-phone mr-2 text-blue-600"></i>Phone
                </label>
                <input type="tel" name="phone" id="phone" required value="<?= htmlspecialchars($contact['phone'] ?? ''); ?>"
                    class="block w-full border border-gray-300 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
            </div>
        </div>

        <div class="flex justify-end space-x-4 pt-6">
            <button type="submit" id="submit" name="submit"
                class="inline-flex items-center px-6 py-3 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium shadow-lg hover:shadow-xl transition-all duration-200">
                <i class="fas fa-save mr-2"></i>
                Save Contact
            </button>
        </div>
    </form>
</div>