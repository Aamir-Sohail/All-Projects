<?php

class database
{

  private $dsn = "mysql:host=localhost; dbname=eefpkorg_dummy";
  private $dbuser = "eefpkorg_dummy";
  private $dbpass = "eefpkorg_dummy";

  public $conn;

  public function __construct()
  {
    try {
      $this->conn = new PDO($this->dsn, $this->dbuser, $this->dbpass);

    } catch (PDOException $e) {
      echo "Error : " . $e->getmessage();
    }
    return $this->conn;
  }

  public function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

}
