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
            addDynamicProperty("errMsg", $errMsg);
            return "login"._EXTENSION_PHP;
        }
        return _BASE_REDIRECT."/product/list";
    }
}


?>