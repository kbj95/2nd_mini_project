<?php
namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo){
        $sql = 
            " SELECT "
            ." * "
            ." FROM "
            ." user_info "
            ." WHERE "
            ." u_id = :id "
            ." AND "
            ." u_pw = :pw "
            ;

        $prepare = [
            ":id" => $arrUserInfo["id"]
            ,":pw" => $arrUserInfo["pw"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch ( Exception $e ){
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
        // finally {
        //     $this->closeConn();
        // }
        return $result;
    }

    public function joinUser($arrUserInfo){
        $sql =
        " INSERT INTO "
        ." user_info( "
        ." u_id "
        ." ,u_pw "
        ." ,u_name "
        ." ,u_adress "
        ." ,u_phone_num "
        ." ,u_email "
        ." ,u_from_date "
        ." ) "
        ." VALUES( "
        ." :id "
        ." ,:pw "
        ." ,:name "
        ." ,:adress "
        ." ,:phoneNum "
        ." ,:email "
        ." ,NOW() "
        ." ) "
        ;

        $prepare = [
            ":id" => $arrUserInfo["id"]
            ,":pw" => $arrUserInfo["pw"]
            ,":name" => $arrUserInfo["name"]
            ,":adress" => $arrUserInfo["adress"]
            ,":phoneNum" => $arrUserInfo["phoneNum"]
            ,":email" => $arrUserInfo["email"]
        ];
        try
        {
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result_cnt = $stmt->rowCount();
            $this->conn->commit();
        }
        catch( Exception $e )
        {
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
    }

    public function getTest($arrUserInfo){
        $sql = 
            " SELECT "
            ." * "
            ." FROM "
            ." user_info "
            ." WHERE "
            ." u_id = :id "
            ;

        $prepare = [
            ":id" => $arrUserInfo["id"]
        ];
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch ( Exception $e ){
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
        // finally {
        //     $this->closeConn();
        // }
        return $result;
    }
}
?>