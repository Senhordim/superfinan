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

    public function findAll(string $fields = '*', string $order = 'ASC') : array
    {
        $sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ORDER BY created_at ' . $order;
        $get = $this->conn->query($sql);
        return $get->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id, string $fields = '*', )
    {
        return current($this->where(['id' => $id], '', $fields));
    }

    public function where(
        array $conditions,
        string $operator = ' AND ',
        string $fields = '*'
    ) : array
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

    public function insert(array $data) : bool
    {
        $binds = array_keys($data);

        $sql = 'INSERT INTO ' .  $this->table . '(' . implode(', ', $binds) . ', created_at, updated_at)
                VALUES(:' . implode(', :', $binds) .', ' . time() . ', ' .  time() . ')';



        $insert = $this->bind($sql, $data);



        return $insert->execute();
    }

    public function update($data) : bool
    {
        if(!array_key_exists('id', $data)){
            throw new \Exception('É necessário informar um ID válido para atualizar');
        }

        $sql = 'UPDATE ' . $this->table . ' SET ';

        $set = null;

        $binds = array_keys($data);

        foreach ($binds as $v) {
            if($v !== 'id'){
                $set .= is_null($set) ? $v . ' = :' . $v : ', ' . $v . ' = :' . $v;
            }

        };

        $sql .= $set . ', updated_at = ' . time() . ' WHERE id = :id';

        $update = $this->bind($sql, $data);

        return $update->execute();
    }

    public function delete(int $id) : bool
    {
        $sql = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        $delete = $this->bind($sql, ['id' => $id]);

        return $delete->execute();
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
