<?php

namespace Migrations;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv=Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();



class Database{

  private $host;
  private $user;
  private $password;
  private $dbname;
  private $db;

  public function createDatabase(){

    $host = $_ENV['DB_HOST'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];

    try{
      $this->pdo = new PDO("mysql:host=$host", $user, $password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname"); 

      $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      echo "Database succesfully. \n";


    }catch (PDOException $e){
      die("Error: " . $e->getMessage());
    }
    
    $this->pdo->exec("CREATE TABLE IF NOT EXISTS users(
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                role  ENUM('user', 'admin') DEFAULT 'user',
                password VARCHAR(255) NOT NULL
            )");

    $this->pdo->exec("CREATE TABLE IF NOT EXISTS tasks(
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                description  VARCHAR(255) NOT NULL,
                active BOOL DEFAULT false,
                status ENUM('Published', 'Drafted') DEFAULT 'Drafted',
                difficulty ENUM('easy', 'middle', 'hard') NOT NULL,
                deadline INT NOT NULL,
                created_at timestamp,
                updated_at timestamp
    )");

   
    $this->pdo->exec("CREATE TABLE IF NOT EXISTS users_tasks(
                user_id INT,
                task_id InT,
                PRIMARY KEY (user_id, task_id),
                FOREIGN KEY(user_id) REFERENCES users(id),
                FOREIGN KEY(task_id) REFERENCES tasks(id),
                status ENUM('Available', 'InProgress', 'Completed') DEFAULT 'Available',
                started_at timestamp,
                finished_at timestamp
    )");

    $this->pdo->exec("CREATE TABLE IF NOT EXISTS required_knowledge(
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255),
                resources varchar(255),
                task_id INT,
                FOREIGN KEY(task_id) REFERENCES tasks(id)
              )");

    $this->pdo->exec("CREATE TABLE IF NOT EXISTS requirements(
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255),
                resources VARCHAR(255),
                task_id INT,
                FOREIGN KEY(task_id) REFERENCES tasks(id)
              )");

  }

} 
$nn = new Database();
$nn->createDatabase();
