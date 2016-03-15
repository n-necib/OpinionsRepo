<?php


class UsersModel extends BaseModel
{
    private $table = 'users';

    public function login($username, $password){

            $smt = self::$db->prepare(
                "SELECT COUNT(id), is_admin
             FROM users
             WHERE username = ?
             AND password = ?");
            $smt->bind_param("ss", $username, $password);
            $smt->execute();
            return $smt->get_result()->fetch_assoc();



    }

    public function getUserById($id){
        return $this->getById($this->table, $id);
    }

    public function register($params){
        $this->create($this->table, $params);
    }

    public function editUser($columns, $id){
        return $this->edit($this->table, $columns, $id);
    }

    public function deleteUser($id){
        return $this->delete($this->table, $id);
    }

}