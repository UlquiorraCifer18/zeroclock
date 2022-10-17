<?php
class Content {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;
  public $lastID = null;
  public $error = "";
  function __construct() { try {
    $this->pdo = new PDO(
      "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
      DB_USER, DB_PASSWORD, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  } catch (Exception $ex) { exit($ex->getMessage()); }}

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct() {
    if ($this->stmt !== null) { $this->stmt = null; }
    if ($this->pdo !== null) { $this->pdo = null; }
  }

  // (C) HELPER - EXECUTE SQL QUERY
  function exec ($sql, $data=null) {
    $this->stmt = $this->pdo->prepare($sql);
    $this->stmt->execute($data);
  }

  // (D) UPDATE CONTENT
  function save ($html) {
    $this->exec("UPDATE `user_info` SET `chatlog` = (?) WHERE `user_id`= ?", [$html, $_SESSION['uid']]);    
    return true;
  }

  // (E) LOAD CONTENT
  function load ($id) {
    $this->exec("SELECT `chatlog` FROM `user_info` WHERE `user_id`=?", [$id]);
    return $this->stmt->fetchColumn();
  }
}

// (F) DATABASE SETTINGS - CHANGE THESE TO YOUR OWN
define("DB_HOST", "localhost");
define("DB_NAME", "ecommerce");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (G) CONTENT OBJECT
$_CONTENT = new Content();