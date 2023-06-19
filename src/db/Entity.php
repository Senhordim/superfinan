<?php 

namespace SFinan\DB;

use \PDO;

abstract class Entity
{
    private $conn;

    protected $table;
    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findAll(string $fields = '*') 
    {
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table;
        $get = $this->conn->query($sql);
        return $get->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(string $fields = '*', int $id)
    {
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table .  ' WHERE id = :id';
        $get = $this->conn->prepare($sql);
        $get->bindValue(':id', $id, PDO::PARAM_INT);
        $get->execute();
        return $get->fetch(PDO::FETCH_ASSOC);
    }

    public function where(
        array $conditions, 
        string $operator = ' AND ', 
        string $fields = '*'
    )
    { 
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' WHERE ';
        
        $binds = array_keys($conditions);

        $where = null;

        foreach ($binds as $v) {
            if (is_null($where)) {
                $where .= $v . ' = :' . $v;
            } else {
                $where .= $operator . $v . ' = :' . $v;
            }
        }

        $sql .= $where;

        $get = $this->conn->prepare($sql);

        foreach ($conditions as $k => $v) {
           gettype($v) == 'int' 
            ? $get->bindParam(':' . $k, $v, PDO::PARAM_INT) 
            : $get->bindParam(':' . $k, $v, PDO::PARAM_STR);
        }

        return $get->fetchAll(PDO::FETCH_ASSOC);
    }
}