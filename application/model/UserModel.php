<?php
namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo, $pwFlg = true ){
        $sql = 
            " SELECT "
            ." * "
            ." FROM "
            ." user_info "
            ." WHERE "
            ." u_id = :id "
            ." AND "
            ." u_del_flg = 0 "
            ;
        
        if($pwFlg){
            $sql .=             
                " AND "
                ." u_pw = :pw "
                ;
        }

        $prepare = [
            ":id" => $arrUserInfo["id"]
        ];

        if($pwFlg){
            $prepare[":pw"] = $arrUserInfo["pw"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch ( Exception $e ){
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
        // 0516 Del
        // finally {
        //     $this->closeConn();
        // }
        return $result;
    }

    // 회원가입 - Insert
    public function joinUser($arrUserInfo){
        $sql =
        " INSERT INTO "
        ." user_info( "
        ." u_id "
        ." ,u_pw "
        ." ,u_name "
        ." ,u_phone_num "
        ." ,u_from_date "
        ." ) "
        ." VALUES( "
        ." :id "
        ." ,:pw "
        ." ,:name "
        ." ,:phoneNum "
        ." ,NOW() "
        ." ) "
        ;

        $prepare = [
            ":id" => $arrUserInfo["id"]
            ,":pw" => $arrUserInfo["pw"]
            ,":name" => $arrUserInfo["name"]
            ,":phoneNum" => $arrUserInfo["phoneNum"]
        ];
        try
        {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result; // true 또는 false로 반환
        }
        catch( Exception $e )
        {
            // 0516 update
            // echo "UserModel->getUser Error : ".$e->getMessage();
            // exit();
            return false;
        }
    }

}
?>