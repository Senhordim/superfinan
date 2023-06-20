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
        return current($this->where(['id' => $id], '', $fields));
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

        $get = $this->bind($sql, $conditions);
        
        $get->execute();

        return $get->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $binds = array_keys($data);
        $sql = 'INSERT INTO ' .  $this->table . '(' . implode(', :', $binds) . ', create_at, update_at)
                VALUES(:'. implode(', :', $binds) . ', NOW(), NOW())';

        $insert = $this->bind($sql, $data);

        return $insert->execute();
    }

    private function bind($sql, $data)
    {

        $bind = $this->conn->prepare($sql);

        foreach ($data as $k => $v) {
            gettype($v) == 'int' 
             ? $bind->bindValue(':' . $k, $v, PDO::PARAM_INT) 
             : $bind->bindValue(':' . $k, $v, PDO::PARAM_STR);
         }

         return $bind;
    }
}