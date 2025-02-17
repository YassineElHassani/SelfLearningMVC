# Apprentissage du MVC

Ce guide vous accompagnera étape par étape dans la création d'une application MVC avec PHP et PDO.

---

## **Phase 1 : Application simple avec CRUD (Tout dans le même dossier)**
### Objectif : Comprendre les bases de PHP et PDO en construisant un CRUD simple.

### **Structure du projet :**
```
/crud-app
   |-- index.php       # Liste des enregistrements
   |-- create.php      # Formulaire d'ajout
   |-- store.php      # Traitement de l'ajout
   |-- edit.php        # Formulaire de modification
   |-- update.php      # Traitement de la modification
   |-- delete.php      # Suppression d'un enregistrement
   |-- db.php          # Fichier de connexion à la base de données
```

---

## **Phase 2 : Introduction du Modèle (Séparation de la communication avec la base de données)**
### Objectif : Mieux organiser le code en séparant l'accès aux données.

### **Nouvelle structure :**
```
/crud-app
   |-- index.php        
   |-- create.php      
   |-- edit.php       
   |-- delete.php      
   |-- models/
       |-- Database.php    # Classe de connexion PDO
       |-- Contact.php     # Classe pour les opérations CRUD
```

---

## **Phase 3 : Séparation du Code Métier et des Vues**
### Objectif : Suivre une meilleure organisation du code MVC.

### **Nouvelle structure :**
```
/crud-app
   |-- index.php        
   |-- views/
       |-- header.php      
       |-- footer.php      
       |-- list.php        # Liste des contacts
       |-- form.php        # Formulaire réutilisable (ajout/modification)
   |-- models/
       |-- Database.php    
       |-- Contact.php     
```

---

## **Phase 4 : Utilisation de `.htaccess` pour Rediriger vers `index.php`**
### Objectif : Améliorer les URLs et centraliser les requêtes.

**Fichier `.htaccess` :**
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
```

---

## **Phase 5 : Création d’un Routeur avec un `switch`**
### Objectif : Centraliser la logique de navigation.

À ce stade, nous avons toujours le code métier réparti dans des fichiers comme `index.php`, `create.php`, etc. Nous allons maintenant centraliser la gestion des routes.

**Exemple de routeur dans `index.php` :**
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
        echo "Page non trouvée";
}
```

---

## **Phase 6 : Transformer le Routeur en Classe**
### Objectif : Rendre le routeur plus flexible et réutilisable.

**Exemple de `Router.php` :**
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
            echo "Page non trouvée";
        }
    }
}
```

---

## **Phase 7 : Utilisation des Contrôleurs sous forme de Classes**
### Objectif : Suivre le modèle MVC classique avec des contrôleurs dédiés.

**Exemple de `ContactController.php` :**
```php
class ContactController {
    public function index() {
        $contacts = (new Contact())->getAll();
        require 'views/list.php';
    }
}
```

---

## **Phase 8 : Gestion de la Connexion avec un Singleton (`Database.php`)**
### Objectif : Éviter les multiples connexions à la base de données.

**Exemple de `Database.php` :**
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

## **Phase 9 : Utilisation de `composer autoload`**
### Objectif : Remplacer les `require` par un autoloading automatique.

1. **Créer un fichier `composer.json` :**
```json
{
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    }
}
```
2. **Exécuter la commande :**
```sh
composer dump-autoload
```
3. **Remplacer les `require` par :**
```php
use App\Models\Contact;
```

---

## **Conclusion**
Avec ce plan, vous progresserez étape par étape jusqu'à une architecture MVC complète et professionnelle ! 🚀

