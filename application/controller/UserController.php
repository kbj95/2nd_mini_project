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
        $this->model->close(); //DB 파기

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

    // 회원가입
    public function joinGet(){
        return "join"._EXTENSTION_PHP;
    }

    public function joinPost(){
        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성체크
        // ID 글자수 체크
        if(mb_strlen($arrPost["id"]) < 3 || mb_strlen($arrPost["id"]) > 12 ){
            $arrChkErr["id"] = "ID는 12글자 이하로 입력해 주세요.";
        }
        // ID 영문숫자 체크

        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20){
            $arrChkErr["pw"] = "PW는 8~20글자로 입력해 주세요.";
        }
        // PW 영문숫자특수문자 체크

        // 비밀번호와 비밀번호체크 확인
        if($arrPost["pw"] !== $arrPost["pwChk"]){
            $arrChkErr["pwChk"] = "비밀번호와 비밀번호확인이 일치하지 않습니다.";
        }

        //NAME 글자수 체크
        if(mb_strlen($arrPost["name"]) === 0 || mb_strlen($arrPost["name"]) > 30){
            $arrChkErr["name"] = "이름을 다시 입력해 주세요.";
        }

        // 유효성체크 에러일 경우
        if(!empty($arrChkErr)){
            // 에러메세지 셋팅
            $this->addDynamicProperty("arrError",$arrChkErr);
            return "join"._EXTENSTION_PHP;
        }

        $result = $this->model->getUser($arrPost, false);

        // 유저 유무 체크
        if(count($result) !== 0){
            $errMsg = "입력하신 ID가 사용중입니다.";
            $this->addDynamicProperty("errMsg",$errMsg);
            // 회원가입페이지
            return "join"._EXTENSTION_PHP;
        }

        // Transaction start
        $this->model->beginTransaction();

        // 회원가입
        if(!$this->model->joinUser($arrPost)){
            // 예외처리 롤백
            $this->model->rollBack();
            echo "User Regist ERROR";
            exit();
        }
        // 정상처리시 커밋
        $this->model->commit();

        // 로그인 페이지로 이동
        return _BASE_REDIRECT."/User/login";
    }

    // ----------------------내가 만든 회원가입 ------------------
    // // GET 방식으로 회원가입 페이지를 요청할 때 실행되는 메소드
    // public function joinGet(){
    //     return "join"._EXTENSTION_PHP;
    // }

    // // POST 방식으로 로그인 정보를 전달할 때 실행되는 메소드 
    // public function joinPost(){
    //     $result = $this->model->joinUser($_POST);

    //     return _BASE_REDIRECT."/Shop/main";
    // } ---------------------------------------------------------
    
}
?>