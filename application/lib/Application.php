<?php
//** Controller 호출하는 역할 **/

// class 파일명 : 카멜기법 사용, 제일 앞 대문자!, class명이랑 같음
// namespace 설정은 역슬래시(\) 사용!!

namespace application\lib; // 파일 별로 class 사용 구분해줌

use application\util\UrlUtil; // use 안쓰면 class명만 넘어감, use 써줘야 autoload에 path가 넘어감

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
        // $identityName = empty($arrPath[0]) ? "User" : ucfirst($arrPath[0]); // ucfirst : 대문자 만들어줌
        // $action = (empty($arrPath[1]) ? "login" : $arrPath[1]).ucfirst(strtolower($_SERVER["REQUEST_METHOD"])); // ucfirst(strtolower($_SERVER["REQUEST_METHOD"])) : GET -> get -> Get / $action = loginGet 이라는 값 담김
        $identityName = empty($arrPath[0]) ? "Shop" : ucfirst($arrPath[0]);
        $action = (empty($arrPath[1]) ? "main" : $arrPath[1]).ucfirst(strtolower($_SERVER["REQUEST_METHOD"]));
        
        // controller 명 작성
        $controllerPath = _PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER._EXTENSION_PHP; // = application/controller/UserController.php

        // 해당 controller 파일 존재 여부 체크 (해당 class 호출 전에 미리 체크, 호출하고 체크하려면 힘듦)
        if(!file_exists($controllerPath)) {
            echo "해당 컨트롤러 파일이 없습니다. : ".$controllerPath;
            exit();
        }

        // 해당 Controller 호출
        $controllerName = UrlUtil::replaceSlashToBackslash(_PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER); // 역슬러시로 바꿔줌 = application\controller\UserController
        new $controllerName($identityName, $action); // = application\controller\UserController(User, loginGet)

    }
}



?>