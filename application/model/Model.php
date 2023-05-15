<?php
//---------------------------------------------------------------
// Model은 애플리케이션의 데이터와 비즈니스 로직을 관리
// 데이터베이스나 파일, API 등과 같은 데이터 소스에서 데이터를 가져오고, 해당 데이터를 가공하거나 연산을 수행함

// * 비즈니스 로직 : 
// 어떤 비즈니스 프로세스나 문제를 해결하기 위한 규칙이나 규칙 세트를 의미
// 간단히 말해서, 어떤 일을 수행하는 데 필요한 규칙이나 조건들
// 일반적으로 데이터베이스나 파일 등의 데이터 저장소에서 데이터를 가져오고, 이를 처리하여 결과를 반환하는 과정에서 적용됨
//---------------------------------------------------------------
namespace application\model;

use PDO;
use Exception;

class Model {
    protected $conn;

    public function __construct(){
        $dns = "mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;
        $option = 
            [
                PDO::ATTR_EMULATE_PREPARES      => false
                ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
                ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
            ];
        
        try {
            $this->conn = new PDO($dns, _DB_USER, _DB_PASSWORD, $option);
        } catch (Exception $e){
            echo "DB Connect Error : ".$e->getMessage();
            exit();
        }
    }

    // DB Connect 파기
    protected function closeConn(){
        $this->conn = null;
    }
}
?>