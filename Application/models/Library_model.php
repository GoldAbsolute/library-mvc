<?php

namespace Models;
require 'Application/core/model.php';
require 'Application/database/Connection.php';

use Model;
use Connection;
use PDO;

class library_model extends Model
{
    private PDO $connection;
    public function __construct() {
        $obj = new Connection();
        $this->connection = $obj->getConnection();
    }
    public function getAllBooks(): bool|string
    {
        $statement = $this->connection->prepare('SELECT * FROM library');
        $statement->execute();
        $response = $statement->fetchAll(PDO::FETCH_OBJ);
        return json_encode($response);
    }

    public function getOneBook(array $params): bool|string
    {
        $sql = "SELECT * FROM `library` WHERE `id` = :id || `author` LIKE :author || `title` LIKE :title || `year` = :year";
        $statement = $this->connection->prepare($sql);

        $id = $params['id'] ?? -1;
        $author = $params['author'] ?? "Автор не указан";
        $title = $params['title'] ?? "Название не указано";
        $year = $params['year'] ?? -1;

        $statement->bindParam(':id', $id);
        $statement->bindParam(':author', $author);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':year', $year);

        $statement->execute();
        $response = $statement->fetchAll(PDO::FETCH_OBJ);
        return json_encode($response);
    }

    function addOneBook(array $data): bool|string
    {
        $author = $data['author'];
        $title = $data['title'];
        $year = $data['year'];

        $statement = $this->connection->prepare('INSERT INTO library (author, title, year) VALUES (:author, :title, :year)');
        $statement->bindParam(':author', $author);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':year', $year);
        $response = $statement->execute();
        return json_encode($response);
    }

    function updateBook(array $data): bool|string
    {
        $author = $data['author'];
        $title = $data['title'];
        $year = $data['year'];
        $id = $data['id'];

        $statement = $this->connection->prepare("UPDATE `library` SET `author` = :author, `title` = :title, `year` = :year WHERE `library`.`id` = :id");
        $statement->bindParam(':author', $author);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':year', $year);
        $statement->bindParam(':id', $id);
        $response = $statement->execute();
        return json_encode($response);
    }

    function deleteBook(int $id): bool|string
    {
        $statement = $this->connection->prepare('DELETE FROM library WHERE id = :id');
        $statement->bindParam(':id', $id);
        $response = $statement->execute();
        return json_encode($response);
    }
}