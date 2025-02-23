<?php
class Database {
  private static $host = "localhost";
  private static $database = "crud_app";
  private static $username = "root";
  private static $password = "";
  private static $conn;

  public static function getConnection()
  {
      if(self::$conn){
          return self::$conn;
      }
      else {
          self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$database, self::$username, self::$password);
          return self::$conn;
      }
  }
}
?>