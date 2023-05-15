<?php
namespace application\controller;

class UserController extends Controller{
    // GET 방식으로 로그인 페이지를 요청할 때 실행되는 메소드
    public function loginGet(){
        return "login"._EXTENSTION_PHP;
    }

    // POST 방식으로 로그인 정보를 전달할 때 실행되는 메소드 
    public function loginPost(){
        $result = $this->model->getUser($_POST);
        // 유저 유무 체크 (입력된 로그인 정보가 DB에 있는지 확인하고, 정보가 없으면 에러 메시지를 출력한 후 로그인 페이지를 다시 로드)
        if(count($result) === 0){
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 로그인 페이지 리턴
            return "login"._EXTENSTION_PHP;
        }
        // session에 User ID 저장 (정보가 있다면 로그인 성공처리, 세션에 유저 ID를 저장하고 리스트 페이지로 이동)
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];
        $_SESSION["u_name"] = $result[0]["u_name"];

        // 메인 페이지 리턴
        return _BASE_REDIRECT."/Shop/main";
    }

    // 로그아웃 메소드
    public function logoutGet(){
        session_unset();
        session_destroy();
        // 로그아웃후에 메인페이지로 이동
        return "main"._EXTENSTION_PHP;
    }

    // GET 방식으로 회원가입 페이지를 요청할 때 실행되는 메소드
    public function joinGet(){
        return "join"._EXTENSTION_PHP;
    }

    // POST 방식으로 로그인 정보를 전달할 때 실행되는 메소드 
    public function joinPost(){
        $result = $this->model->joinUser($_POST);

        return _BASE_REDIRECT."/Shop/main";
    }
    
}
?>