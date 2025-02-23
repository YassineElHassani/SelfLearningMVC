<?php
require_once 'Database.php';


class Contact {
    private $name;
    private $email;
    private $phone;
    private $id;

    public function __construct($id = null, $name = null, $email = null, $phone = null) {
        $this->id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function createContact($name, $email, $phone) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone
        ]);
    }

    public function displayContact() {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM contacts");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getContact($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }

    public function updateContant($id, $name, $email, $phone) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE contacts SET name = :name, email = :email, phone = :phone WHERE id = :id");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':id' => $id
        ]);
    }

    public function deleteContact($id) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM contacts WHERE id = :id");
        $stmt->execute([
            ':id' => $id
        ]);
    }

}

?>