<?php
// class 파일명 : 카멜기법 사용, 제일 앞 대문자!, class명이랑 같음
// namespace 설정은 역슬래시(\) 사용!!

namespace application\lib;

use application\util\UrlUtil; // autoload가 얘를 인식함?????

class Application {

    // 생성자
    // public function __construct() {
    //     $path = isset($_GET["url"]) ? $_GET["url"] : "";
    //     $arr_path = $path !== "" ? explode("/", $path) : "";

    //     var_dump($arr_path);
    //     exit;
    // }

    // 생성자
    public function __construct() {
        $arrPath = UrlUtil::getUrlArrPath(); // 접속 URL을 배열로 획득
        $identityName = empty($arrPath[0]) ? "User" : ucfirst($arrPath[0]);
        $action = (empty($arrPath[1]) ? "login" : $arrPath[1]).ucfirst(strtolower($_SERVER["REQUEST_METHOD"]));

        // controller 명 작성
        $controllerPath = _PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER._EXTENSION_PHP; 

        // 해당 controller 파일 존재 여부 체크
        if(!file_exists($controllerPath)) {
            echo "해당 컨트롤러 파일이 없습니다. : ".$controllerPath;
            exit();
        }

        // 해당 Controller 호출
        $controllerName = UrlUtil::replaceSlashToBackslash(_PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER);
        new $controllerName($identityName, $action);

    }
}



?>