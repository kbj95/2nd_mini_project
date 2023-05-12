<?php

// 객체지향으로 만들어진 사이트는 보통 대규모 사이트이기 때문에, php파일만 해도 수백~수천개가 될 수 있음
// 파일 이름이 중복 될 수밖에 없기 떄문에 , 네임스페이스를 설정해준다.
namespace application\lib;

use application\util\UrlUtil; // autoload가 인식하는 경로

// 클래스명은 파일명과 똑같이 짓는게 규칙
class Application {

    // 생성자
    public function __construct(){
        $arrPath = UrlUtil::getUrlArrPath(); // 접속 URL을 배열로 획득
        $identityName = empty($arrPath[0]) ? "User" : ucfirst($arrPath[0]); // 첫글자를 대문자로 변환
        // $_SERVER["REQUEST_METHOD"]로 가져오는 값이 모두 대문자여서 소문자로 바꾼다음 첫글자만 대문자로 변환
        $action = (empty($arrPath[1]) ? "login" : $arrPath[1]).ucfirst(strtolower($_SERVER["REQUEST_METHOD"]));

        // controller명 작성 (config파일에 define참고)
        $controllerPath = _PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER._EXTENSTION_PHP;

        // 해당 controller 파일 존재 여부 체크
        if(!file_exists($controllerPath)){
            echo "해당 컨트롤러 파일이 없습니다.".$controllerPath;
            exit();
        }

        // 해당 Controller 생성
        $controllerName = UrlUtil::replaceSlashToBackSlash(_PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER);
        new $controllerName($identityName,$action);
    }
}

// 네임스페이스 호출방법 : new aplication\lib\Application();

?>