<?php

define("_ROOT", $_SERVER["DOCUMENT_ROOT"]);

// DB관련
define("_DB_HOST","localhost");
define("_DB_USER","root");
define("_DB_PASSWORD","root506"); // git에서 비밀번호 적었다고 오류날수도있음
define("_DB_NAME","minitwo");
define("_DB_CHARSET","utf8mb4");


// 기타
define("_EXTENSTION_PHP", ".php");
define("_PATH_CONTROLLER", "application/controller/");
define("_PATH_MODEL", "application/model/");
define("_PATH_VIEW", "application/view/");


define("_BASE_FILENAME_CONTROLLER","Controller");
define("_BASE_FILENAME_MODEL","Model");

define("_BASE_REDIRECT", "Location: ");

define("_STR_LOGIN_ID", "u_id");

?>