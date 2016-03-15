<?php


class ColumnistsModel extends BaseModel
{
    private $table = 'columnists';

    public function getAllColumnists($offset, $pageSize){
        return $this->getAll($this->table, $offset, $pageSize);
    }

    public function getColumnists(){
        $smt = self::$db->query("SELECT * FROM columnists");
        return $smt->fetch_all(MYSQLI_ASSOC);
    }

    public function getColumnistById($id){
        return $this->getById($this->table, $id);
    }

    public function createColumnist($params){
        return $this->create($this->table, $params);
    }

    public function editColumnist($columns, $id){
        return $this->edit($this->table, $columns, $id);
    }

    public function deleteColumnist($id){
        return $this->delete($this->table, $id);
    }
}