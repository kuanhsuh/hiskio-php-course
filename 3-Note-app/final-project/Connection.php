<?php

class Connection 
{

  public PDO $pdo;

  public function __construct()
  {
    $servername = "localhost";
    $dbname = "2021-hiskio-php-noteapp";
    $username = "root";
    $password = "root";
    try {
      $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function getNotes()
  {
    $mysqlRequest = "SELECT * FROM note ORDER BY created_date DESC";
    $statement = $this->pdo->prepare($mysqlRequest);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addNote($note)
  {
    $mysqlRequest = "INSERT INTO note (title, description, created_date) VALUES (:title, :description, :date)";
    $statement = $this->pdo->prepare($mysqlRequest);
    $statement->bindValue('title', $note['title']);
    $statement->bindValue('description', $note['description']);
    $statement->bindValue('date', date('Y-m-d H:i:s'));
    return $statement->execute();
  }

  public function removeNote($id)
  {
    $mysqlRequest = "DELETE FROM note WHERE id = :id";
    $statement = $this->pdo->prepare($mysqlRequest);
    $statement->bindValue('id', $id);
    return $statement->execute();
  }

  public function getNoteByID($id)
  {
    $mysqlRequest = "SELECT * FROM note where id = :id";
    $statement = $this->pdo->prepare($mysqlRequest);
    $statement->bindValue('id', $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC) ?: [
      'id' => '',
      'title' => '',
      'description' => ''
    ];
  }

  public function updateNote($id, $note)
  {
    $mysqlRequest = "UPDATE note set title = :title, description = :description WHERE id = :id";
    $statement = $this->pdo->prepare($mysqlRequest);
    $statement->bindValue('id', $id);
    $statement->bindValue('title', $note['title']);
    $statement->bindValue('description', $note['description']);
    return $statement->execute();
  }

}

return new Connection();


