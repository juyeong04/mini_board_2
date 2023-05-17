<?php

namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo, $pwFlg = true) {
        $sql = " select * from user_info where u_id = :id "; // 따옴표 앞뒤로 띄워주기!!

        if($pwFlg) {
            $sql .= " and u_pw = :pw ";
        }

        $prepare = [
            ":id" => $arrUserInfo["id"]
        ];

        if($pwFlg) {
            $prepare[":pw"] = $arrUserInfo["pw"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch (Exception $e) {
            echo "UserModel->getUser Error : ".$e->gerMessage();
            exit();
        }
        // finally {
        //     $this->closeConn();
        // }
        return $result;
    }


    // Insert User
    public function insertUser($arrUserInfo) {
        $sql = " INSERT INTO user_info (
                u_id
                , u_pw
                , u_name
                )
                VALUES (
                :u_id
                , :u_pw
                , :u_name
                ) ";
        $prepare = [
            ":u_id" => $arrUserInfo["id"]
            ,":u_pw" => $arrUserInfo["pw"]
            ,":u_name" => $arrUserInfo["name"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        }
        catch (Exception $e) {
            // echo "UserModel->insertUser Error : ".$e->gerMessage();
            // exit();
            return false;
        }
    }

    public function updateUser($arrUserInfo) {
        $sql = " UPDATE user_info SET u_pw = :u_pw WHERE u_id = :u_id ";
        $prepare = [
            ":u_id" => $arrUserInfo["id"]
            ,":u_pw" => $arrUserInfo["pw"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        }
        catch (Exception $e) {
            return false;
        }
    }
}


?>
