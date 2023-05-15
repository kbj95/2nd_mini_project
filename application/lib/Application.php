<?php
//---------------------------------------------------------------
// 웹 어플리케이션에서 필요한 여러 기능을 제공하는 모듈화된 코드 모음
// 라이브러리는 일반적으로 다른 코드에서 사용될 수 있는 특정한 기능을 포함하며,
// 개발자는 필요한 기능을 라이브러리에서 가져와 사용할 수 있음
// 개발자가 매번 코드를 작성하지 않아도 되도록, 자주 사용되는 기능들을 모듈화된 코드 모음으로 제공하는 것
// 이를 통해 개발자는 기능 구현에만 집중할 수 있으며, 생산성을 높일 수 있음
//---------------------------------------------------------------
// 객체지향으로 만들어진 사이트는 보통 대규모 사이트이기 때문에, php파일만 해도 수백~수천개가 될 수 있음
// 파일 이름이 중복 될 수밖에 없기 떄문에 , 네임스페이스를 설정해준다.

// 네임스페이스 호출방법 : new aplication\lib\Application();

namespace application\lib;

// autoload가 인식하는 경로 잡아주기
use application\util\UrlUtil;

// 클래스명은 파일명과 똑같이 짓는게 규칙
class Application {

    // 생성자
    public function __construct(){
        // 접속 url을 배열로 획득
        // + UrlUtil.php의 getUrlArrPath() 메서드를 사용하여 URL 경로를 배열로 가져옴
        // + UrlUtil의 네임스페이스를 적어주지 않은 이유 : 최상단에  use application\util\UrlUtil;로 경로를 잡아줘서
        $arrPath = UrlUtil::getUrlArrPath();

        // $arrPath[0]이 있다면 첫글자를 대문자로 변환해서 반환
        // $arrPath[0]이 없다면 "User"를 반환
        // + ex) URL 경로가 "/product/list"인 경우 $arrPath 배열에는 "product"와 "list" 두 개의 요소가 저장되고, 
        // + 첫번째 요소인 "product"를 ucfirst 함수를 사용하여 첫글자를 대문자로 변환한 후,
        // + "Product"라는 문자열이 $identityName 변수에 저장
        $identityName = empty($arrPath[0]) ? "Shop" : ucfirst($arrPath[0]);

        // GET이 전부 대문자기때문에 모두 소문자로 바꿔준 뒤, 첫글자만 대문자로(= Get)
        // + URL 경로의 "login"이 존재하는 경우 HTTP 요청 메서드(첫 글자를 대문자로 변환, = Get)와 연결하여 수행할 작업을 결정함
        // + ex) loginGet
        $action = (empty($arrPath[1]) ? "main" : $arrPath[1]).ucfirst(strtolower($_SERVER["REQUEST_METHOD"]));

        // controller명 작성 (config파일에 define참고)
        // + 결정된 컨트롤러 이름을 기반으로 컨트롤러 파일의 경로를 구성
        $controllerPath = _PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER._EXTENSTION_PHP;

        // 해당 controller 파일 존재 여부 체크
        // + 컨트롤러 파일이 있는지 확인하고 없으면 오류 메시지와 함께 프로그램을 종료
        if(!file_exists($controllerPath)){
            echo "해당 컨트롤러 파일이 없습니다.".$controllerPath;
            exit();
        }

        // 해당 Controller 호출
        // + 결정된 컨트롤러 이름을 기반으로 컨트롤러 클래스의 이름을 지정
        // + ex) $identityName 변수가 "User"라는 값이면, 컨트롤러 클래스의 이름은 "UserController"가 됨
        // + ex) $controllerName = application\controller\UserController
        // replaceSlashToBackSlash : "/" 를 "\" 로 바꿔주는 함수
        $controllerName = UrlUtil::replaceSlashToBackSlash(_PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER);

        // + 결정된 동작을 매개변수로 컨트롤러 클래스를 인스턴스화함
        // + application\controller\UserController("User", "loginGet");
        new $controllerName($identityName,$action);
    }
}

?>