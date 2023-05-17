<?php
//---------------------------------------------------------------
// Controller는 Model과 View 간의 중개자 역할을 수행
// 사용자의 입력을 받아 View에서 이벤트가 발생하면, 해당 이벤트를 분석하고,
// 이에 따라 Model을 업데이트하거나, View를 업데이트함
//---------------------------------------------------------------

namespace application\controller;

use application\util\UrlUtil;

use \AllowDynamicProperties; // DynamicProperty를 사용하려면 적어줌
#[AllowDynamicProperties] // DynamicProperty를 사용하려면 적어줌

class Controller {
    protected $model;
    // 여러개의 모델을 불러올 경우, 이미 불러온 모델을 또다시 불러올 경우 많은 메모리를 사용하게됨, 서버의 부하를 줄이기 위해 사용
    private static $modelList = [];
    // 인증이 필요한 페이지 이름을 적어줌
    private static $arrNeedAuth = ["user/mypage","user/cart"];
    
    // 생성자
    // + $identityName : User, $action : loginGet
    public function __construct($identityName, $action) {
        // session start
        // + 현재 세션이 없으면 세션을 시작
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

        // model 호출
        $this->model = $this->getModel($identityName);

        // controller의 메소드 호출
        $view = $this->$action();

        if(empty($view)) {
            echo "해당 Controller에 메소드가 없습니다. : ".$action;
            exit();
        }

        // view 호출
        require_once $this->getView($view);
    }

    // model 호출하고 결과를 리턴
    protected function getModel($identityName) {
        // model 생성 체크
        // + 현재 생성된 모델 배열(self::$modelList)에 모델이 없으면 생성
        // + self:: : 나 자신
        // + $this-> 가 아닌 self:: 를 사용한 이유 : Application.php에서 호출한 컨트롤러는 UserController이기 때문에, 
        // + Controller.php 의 private 에는 $this->로 접근할수 없음($this의 영역은 UserController)
        if(!in_array($identityName, self::$modelList)) {
            // + model class 호출해서 모델 객체 생성
            // + ex) application\model\UserModel
            $modelName = UrlUtil::replaceSlashToBackslash(_PATH_MODEL.$identityName._BASE_FILENAME_MODEL);
            // + ex) $modelList["User"] = new application\model\UserModel();
            self::$modelList[$identityName] = new $modelName(); // model class 호출
        }
        // + 생성된 모델 객체 리턴
        return self::$modelList[$identityName];
    }

    // 파라미터를 확인해서 해당하는 view를 리턴하거나 redirect
    protected function getView($view) {
        // view를 체크 : 화면이동 시에는 _BASE_REDIRECT(= "Location: ")를 붙여줄것임
        if(strpos($view, _BASE_REDIRECT) === 0) {
            header($view);
            exit();
        }

        // 뷰 파일 경로 반환
        return _PATH_VIEW.$view;
    }

    // 동적 속성(DynamicProperty)을 세팅하는 메소드
    protected function addDynamicProperty($key, $val) {
        $this->$key = $val;
    }

    // 유저 권한 체크 메소드
    protected function chkAuthorization() {
        // + 현재 URL 경로
        $urlPath = UrlUtil::getUrl();
        // + arrNeedAuth : 인증이 필요한 페이지
        foreach(self::$arrNeedAuth as $authPath) {
            // + strpos($urlPath, $authPath) === 0 : $urlPath(현재경로)가 $authPath(인증이 필요한 페이지 경로)로 시작된다면
            // + ex) $urlPath 가 "product/list" 이고 $authPath 가 "product" 라면 strpos($urlPath, $authPath) 는 0
            // + URL 경로($urlPath)가 인증이 필요한 페이지($authPath)의 경로로 시작하는 경우에만 참이 됨
            // + && 세션이없다면(= 로그인이 되어있지 않다면)
            if(!isset($_SESSION[_STR_LOGIN_ID]) && strpos($urlPath, $authPath) === 0) {
                // + 로그인 페이지로 redirect
                header(_BASE_REDIRECT."/user/login");
                exit();
            }
        }
    }

}

?>