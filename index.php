<?php

// config 파일
// require : 해당 파일을 불러오지 못하면 페이탈 에러, 프로그램이 즉시 멈춘다.
require_once("application/lib/config.php"); // config파일
require_once("application/lib/autoload.php"); // autoload 파일 

new application\lib\Application(); // Application 호출

?>