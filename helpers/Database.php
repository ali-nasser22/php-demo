<?php

namespace helpers;

use helpers\enums\HttpStatus;
use PDO;
use PDOException;
use PDOStatement;

class Database
{

    protected PDO $connection;


    public function __construct(array $connection)
    {
        try {
            $this->connection = new PDO($connection['dsn'], $connection['username'], $connection['password'], $connection['options']);
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            die();
        }
    }

    public function all(string $table): array
    {
        $q = "select * from $table";
        $stmt = $this->query($q);
        return $stmt->fetchAll();
    }

    public function query(string $q, array $params = []): false|PDOStatement
    {
        $stmt = $this->connection->prepare($q);
        $stmt->execute($params);
        return $stmt;
    }

    public function findOrFail(string $table, $val)
    {
        $result = $this->find($table, $val);
        if (!$result) {
            abort(HttpStatus::NOT_FOUND->value, HttpStatus::NOT_FOUND->label());
        }
        return $result;
    }

    public function find(string $table, $val)
    {
        $q = "select * from $table where id = :val";
        $stmt = $this->query($q, ['val' => $val]);
        return $stmt->fetch();
    }

    public function where(string $table, string $col, $val, ?int $limit = null): array
    {
        $q = "select * from $table where $col = :val";
        if (isset($limit)) {
            $q .= " limit $limit";
        }
        $stmt = $this->query($q, ['val' => $val]);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}