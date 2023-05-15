<?php
//---------------------------------------------------------------
// 웹 어플리케이션에서 자주 사용되는 간단한 함수나 클래스를 포함
// 이러한 함수나 클래스는 특정한 기능을 수행하거나,
// 전체 어플리케이션에서 공통적으로 사용될 수 있는 유틸리티 기능을 제공함
// ex) 문자열 처리, 날짜 처리, 파일 처리 등의 유틸리티 기능
//---------------------------------------------------------------

namespace application\util;

class UrlUtil{

    // $_GET["url"]을 분석해서 리턴
    public static function getUrl(){
        return $path = isset($_GET["url"]) ? $_GET["url"] : "" ;
    }

    // URL을 "/"로 구분해서 배열을 만들고 리턴
    public static function getUrlArrPath(){
        // static으로 선언 되어 있기 때문에 인스턴트화 하지 않고 ::로 사용 가능
        // $obj = new UrlUntil();
        // $obj->getUrl();

        // UrlUtill::getUrl() 메소드를 호출하여 $url 변수에 할당
        $url = UrlUtil::getUrl();
        // $url이 빈 문자열("")이 아니면 "/"를 구분자로 사용하여 문자열을 분할한 배열을, 빈 문자열이면 그대로 리턴
        return $url !== "" ? explode("/", $url) : ""; // "/" 단위로 자름
    }

    // "/"를 "\"로 치환해주는 메소드
    public static function replaceSlashToBackSlash($str){
        return str_replace("/","\\",$str);
    }
}
?>