<?php
// 유효성 검사하는 페이지 : https://regexr.com/
namespace application\controller;

class UserController extends Controller{
    // GET 방식으로 로그인 페이지를 요청할 때 실행되는 메소드
    public function loginGet(){
        if($_SESSION){
            return _BASE_REDIRECT."/shop/main";
        }
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
        // return _BASE_REDIRECT."/Shop/main";
        
        return "main"._EXTENSTION_PHP;
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
        if($_SESSION){
            return _BASE_REDIRECT."/shop/main";
        }
        return "join"._EXTENSTION_PHP;
    }

    public function joinPost(){
        $arrPost = $_POST;
        $arrChkErr = [];
        $arrInput = [];
        // 유효성체크
        // ID 글자수 체크
        if(mb_strlen($arrPost["id"]) < 3 || mb_strlen($arrPost["id"]) > 12 ){
            $arrChkErr["id"] = "ID는 영문글자로 입력해주세요.";
        }
        // 유효성검사를 통과하면 값 출력 유지
        else{
            $arrInput["idInput"] = $arrPost["id"];
        }
        // ID 영문숫자 체크
        if(preg_match("/[^a-z0-9]/i", $arrPost["id"])){
            $arrChkErr["id"] = "ID는 영문, 숫자만 사용할 수 있습니다.";
        }
        else{
            $arrInput["idInput"] = $arrPost["id"];
        }
        // ID 첫글자 영어
        if(!preg_match("/^[a-z]/i", $arrPost["id"])) {
			$arrChkErr["id"] = "아이디의 첫글자는 영문이어야 합니다.";
		}
        else{
            $arrInput["idInput"] = $arrPost["id"];
        }

        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20){
            $arrChkErr["pw"] = "PW는 8~20글자로 입력해 주세요.";
        }
        // PW 영문숫자특수문자 체크
        if(preg_match("/\s/u", $arrPost["pw"]) == true){
            $arrChkErr["pw"] = "비밀번호는 공백없이 입력해주세요.";
        }
        if((preg_match("/[0-9]/u", $arrPost["pw"]) === 0 ) || (preg_match("/[a-z]/u", $arrPost["pw"]) === 0 ) || (preg_match("/[\!\@\*]/u", $arrPost["pw"]) === 0 )){
            $arrChkErr["pw"] = "특수문자(!/*/@) 영문, 숫자를 혼합하여 입력해주세요.";
        }

        // 비밀번호와 비밀번호체크 확인
        if($arrPost["pw"] !== $arrPost["pwChk"]){
            $arrChkErr["pwChk"] = "비밀번호와 비밀번호확인이 일치하지 않습니다.";
        }

        // NAME 글자수 체크
        if(mb_strlen($arrPost["name"]) === 0 || mb_strlen($arrPost["name"]) > 30 ){
            $arrChkErr["name"] = "이름을 1~30글자로 입력해주세요.";
        }
        // 유효성검사를 통과하면 값 출력 유지
        else{
            $arrInput["nameInput"] = $arrPost["name"];
        }
        if(preg_match("/[^가-힣a-zA-Z]/u", $arrPost["name"]) !== 0){
            $arrChkErr["name"] = "이름을 다시 입력해주세요.";
        }
        else{
            $arrInput["nameInput"] = $arrPost["name"];
        }

        // 전화번호 유효성 검사
        if(!preg_match("/01([0|1|6|7|8|9])([0-9]{3,4})([0-9]{4})$/", $arrPost["phoneNum"])){
            $arrChkErr["phoneNum"] = "전화번호를 다시 입력해주세요.";
        }
        else{
            $arrInput["phoneInput"] = $arrPost["phoneNum"];
        }

        // 아이디 중복검사를 위해 (데이터베이스에 있는거랑 비교)
        $result = $this->model->getUser($arrPost, false);
        
        // 중복확인 체크 + 아이디 유효성검사까지 되도록 
        // if(count($result) !== 0){
            //     $errMsg = "입력하신 ID가 사용중입니다.";
            //     $this->addDynamicProperty("errMsg",$errMsg);
            //     // 회원가입페이지
            //     // return "join"._EXTENSTION_PHP;
            // }
            if(count($result) !== 0){
                $arrChkErr["id"] ="입력하신 ID가 사용중입니다.";
            }
            
            // Transaction start
            $this->model->beginTransaction();

        // 유효성체크 에러일 경우
        if(!empty($arrChkErr)){
            // 에러메세지 셋팅
            $this->addDynamicProperty("arrError",$arrChkErr);
            $this->addDynamicProperty("arrInput",$arrInput);
            return "join"._EXTENSTION_PHP;
        }

        // 회원가입
        if(!$this->model->joinUser($arrPost)){
            // 예외처리 롤백
            $this->model->rollBack();
            echo "User Regist ERROR";
            exit();
        }
        // 정상처리시 커밋
        $this->model->commit();

        session_unset();
        session_destroy();

        session_start();
        $_SESSION[_STR_LOGIN_ID] = $arrPost["id"];
        $_SESSION[_STR_LOGIN_NAME] = $arrPost["name"];

        // 메인 페이지로 이동
        return _BASE_REDIRECT."/shop/main";
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
    
    // 마이페이지
    public function mypageGet(){
        return "mypage"._EXTENSTION_PHP;
    }
    public function myIdSelect(){
        $arrUserInfo["id"] = $_SESSION[_STR_LOGIN_ID];
        $arrMyinfo = $this->model->getUser($arrUserInfo, false);
        $this->model->close();
        return $arrMyinfo[0];
    }
    public function mypagePost(){
        $arrPost = $_POST;
        $arrChkErr = [];
        $arrInput = [];

        // 유효성체크
        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20){
            $arrChkErr["pw"] = "PW는 8~20글자로 입력해 주세요.";
        }
        // PW 영문숫자특수문자 체크
        if(preg_match("/\s/u", $arrPost["pw"]) == true){
            $arrChkErr["pw"] = "비밀번호는 공백없이 입력해주세요.";
        }
        if((preg_match("/[0-9]/u", $arrPost["pw"]) === 0 ) || (preg_match("/[a-z]/u", $arrPost["pw"]) === 0 ) || (preg_match("/[\!\@\*]/u", $arrPost["pw"]) === 0 )){
            $arrChkErr["pw"] = "특수문자(!/*/@) 영문, 숫자를 혼합하여 입력해주세요.";
        }

        // 비밀번호와 비밀번호체크 확인
        if($arrPost["pw"] !== $arrPost["pwChk"]){
            $arrChkErr["pwChk"] = "비밀번호와 비밀번호확인이 일치하지 않습니다.";
        }

        // NAME 글자수 체크
        if(mb_strlen($arrPost["name"]) === 0 || mb_strlen($arrPost["name"]) > 30 ){
            $arrChkErr["name"] = "이름을 1~30글자로 입력해주세요.";
        }
        // 유효성검사를 통과하면 값 출력 유지
        else{
            $arrInput["nameInput"] = $arrPost["name"];
        }
        if(preg_match("/[^가-힣a-zA-Z]/u", $arrPost["name"]) !== 0){
            $arrChkErr["name"] = "이름을 다시 입력해주세요.";
        }
        else{
            $arrInput["nameInput"] = $arrPost["name"];
        }

        // 전화번호 유효성 검사
        if(!preg_match("/01([0|1|6|7|8|9])([0-9]{3,4})([0-9]{4})$/", $arrPost["phoneNum"])){
            $arrChkErr["phoneNum"] = "전화번호를 다시 입력해주세요.";
        }
        else{
            $arrInput["phoneInput"] = $arrPost["phoneNum"];
        }
        
        // Transaction start
        $this->model->beginTransaction();

        // 유효성체크 에러일 경우
        if(!empty($arrChkErr)){      
            // 에러메세지 셋팅
            $this->addDynamicProperty("arrError",$arrChkErr);
            $this->addDynamicProperty("arrInput",$arrInput);
            return "mypage"._EXTENSTION_PHP;
        }

        // 회원 수정
        if(!$this->model->updateUser($arrPost)){
            // 예외처리 롤백
            $this->model->rollBack();
            echo "User Regist ERROR";
            exit();
        }
        // 정상처리시 커밋
        $this->model->commit();

        session_unset();
        session_destroy();

        session_start();
        $_SESSION[_STR_LOGIN_ID] = $arrPost["id"];
        $_SESSION[_STR_LOGIN_NAME] = $arrPost["name"];

        // 메인 페이지로 이동
        return "main"._EXTENSTION_PHP;

    }

    // 회원탈퇴
    public function outGet(){
        $arrGet = $_GET;
        // Transaction start
        $this->model->beginTransaction();


        // 회원 수정
        if(!$this->model->deleteUser($arrGet)){
            // 예외처리 롤백
            $this->model->rollBack();
            echo "User Regist ERROR";
            exit();
        }
        // 정상처리시 커밋
        $this->model->commit();

        session_unset();
        session_destroy();

        // 메인 페이지로 이동
        return "main"._EXTENSTION_PHP;

    }
}
?>