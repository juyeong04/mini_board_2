<?php

namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST);
        if(count($result) === 0) {
            $errMsg = "입력하신 회원정보가 없습니다";
            $this->addDynamicProperty("errMsg", $errMsg);
            return "login"._EXTENSION_PHP;
        }

        // session에 User Id 저장
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];

        // 리스트 페이지 리턴
        return _BASE_REDIRECT."/product/list";
    }
}


?>