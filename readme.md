# Learning MVC

This guide will walk you through creating an MVC application with PHP and PDO step by step.

---

## **Phase 1: Simple Application with CRUD (All in the Same Folder)**
### Objective: Understand the basics of PHP and PDO by building a simple CRUD.

### **Project Structure:**
```
/crud-app
   |-- index.php       # Records listing
   |-- create.php      # Add form
   |-- store.php       # Add processing
   |-- edit.php        # Edit form
   |-- update.php      # Edit processing
   |-- delete.php      # Record deletion
   |-- db.php          # Database connection file
```

---

## **Phase 2: Introduction to Model (Separating Database Communication)**
### Objective: Better organize code by separating data access.

### **New Structure:**
```
/crud-app
   |-- index.php        
   |-- create.php      
   |-- edit.php       
   |-- delete.php      
   |-- models/
       |-- Database.php    # PDO connection class
       |-- Contact.php     # Class for CRUD operations
```

---

## **Phase 3: Separation of Business Logic and Views**
### Objective: Follow better MVC code organization.

### **New Structure:**
```
/crud-app
   |-- index.php        
   |-- views/
       |-- header.php      
       |-- footer.php      
       |-- list.php        # Contacts list
       |-- form.php        # Reusable form (add/edit)
   |-- models/
       |-- Database.php    
       |-- Contact.php     
```

---

## **Phase 4: Using `.htaccess` to Redirect to `index.php`**
### Objective: Improve URLs and centralize requests.

**`.htaccess` File:**
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
```

---

## **Phase 5: Creating a Router with a `switch`**
### Objective: Centralize navigation logic.

At this stage, we still have business logic spread across files like `index.php`, `create.php`, etc. We will now centralize route management.

**Router example in `index.php`:**
```php
$url = $_GET['url'] ?? 'home';

switch ($url) {
    case 'contacts':
        require 'index.php';
        break;
    case 'add':
        require 'create.php';
        break;
    default:
        echo "Page not found";
}
```

---

## **Phase 6: Transform Router into a Class**
### Objective: Make the router more flexible and reusable.

**Example of `Router.php`:**
```php
class Router {
    private $routes = [];

    public function add($route, $file) {
        $this->routes[$route] = $file;
    }

    public function dispatch($url) {
        if (array_key_exists($url, $this->routes)) {
            require $this->routes[$url];
        } else {
            echo "Page not found";
        }
    }
}
```

---

## **Phase 7: Using Controllers as Classes**
### Objective: Follow the classic MVC pattern with dedicated controllers.

**Example of `ContactController.php`:**
```php
class ContactController {
    public function index() {
        $contacts = (new Contact())->getAll();
        require 'views/list.php';
    }
}
```

---

## **Phase 8: Managing Connection with a Singleton (`Database.php`)**
### Objective: Avoid multiple database connections.

**Example of `Database.php`:**
```php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}
```

---

## **Phase 9: Using `composer autoload`**
### Objective: Replace `require` with automatic autoloading.

1. **Create a `composer.json` file:**
```json
{
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    }
}
```
2. **Execute the command:**
```sh
composer dump-autoload
```
3. **Replace `require` with:**
```php
use App\Models\Contact;
```

---

## **Conclusion**
With this plan, you'll progress step by step toward a complete and professional MVC architecture! 🚀