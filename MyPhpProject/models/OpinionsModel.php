<?php

class OpinionsModel extends BaseModel
{
    private $table = 'opinions';

//    public function getAllOpinions(){
//        return $this->getAll($this->table);
//    }

    public function getOpinionById($id){
        return $this->getById($this->table, $id);
    }

    public function createOpinion($params){
        return $this->create($this->table, $params);
    }

    public function editOpinion($columns, $id){
        return $this->edit($this->table, $columns, $id);
    }

    public function deleteOpinion($id){
        return $this->delete($this->table, $id);
    }

    public function getOpinionsByColumnist($columnistId, $offset, $pageSize){
        $smt = self::$db->prepare("SELECT * FROM opinions WHERE columnist_id = ? LIMIT ? OFFSET ?");
        $smt->bind_param("iii", $columnistId, $pageSize, $offset);
        $smt->execute();
        return $smt->get_result();

    }
}