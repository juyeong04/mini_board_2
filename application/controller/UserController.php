<?php

namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login"._EXTENSION_PHP; // = login.php
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST);
        $this->model->close(); // usermodel에서 파기 안해주고 controller에서 db 파기

        // 유저 유무 체크
        if(count($result) === 0) {
            $errMsg = "입력하신 회원정보가 없습니다";
            $this->addDynamicProperty("errMsg", $errMsg); // key : errMsg / val : $errMsg

            //로그인 페이지로 리턴
            return "login"._EXTENSION_PHP;
        }

        // session에 User Id 저장
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];

        // 리스트 페이지 리턴
        // return _BASE_REDIRECT."/product/list";
        return _BASE_REDIRECT."/shop/main";
    }

    // 로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy();
        return "main"._EXTENSION_PHP;
    }

    // 회원가입 메소드
    public function signupGet() {
        return "signup"._EXTENSION_PHP; // = signup.php
    }
    // public function signupPost() {
    //     // TODO 유효성 체크!!
    //     if($result_cnt === 1) {
    //         $this->model->beginTransaction();
    //         $result_cnt = $this->model->insertUser($_POST);
    //         $this->model->commit();
    //     }
    //     else {
    //         $this->model->rollBack();
    //     }
    //     $this->model->close();
    //     return _BASE_REDIRECT."/shop/main";
        
    // }



    public function signupPost() {
        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성 체크
        // ID 글자수 체크
        if((mb_strlen($arrPost["id"])) === 0 || mb_strlen($arrPost["id"]) > 12) {
            $arrChkErr["id"] = "ID는 12글자 이하로 적으세요";
        }
        // TODO : ID 영문, 숫자 체크

        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20) {
            $arrChkErr["pw"] = "PW는 8~20글자로 적으세요";
        }
        // TODO : PW 영문숫자특수문자 체크
        
        // 비밀번화와 비밀번호 체크 확인
        if($arrPost["pw"] !== $arrPost["pwChk"]) {
            $arrChkErr["pwChk"] = "입력하신 비밀번호가 일치하지 않습니다";
        }

        //name 글자수 체크
        if(mb_strlen($arrPost["name"]) === 0 || mb_strlen($arrPost["name"]) > 30) {
            $arrChkErr["name"] = "이름은 30글자 이하로 적으세요";
        }

        // 유효성체크 에러일 경우
        if(!empty($arrChkErr)) {
            // 에러 메세지 셋팅
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "signup"._EXTENSION_PHP;
        }
        
        // id 중복 체크
        $result = $this->model->getUser($arrPost,false);
        if(count($result) !== 0) {
            $errMsg = "입력하신 ID가 사용중입니다";
            $this->addDynamicProperty("errMsg", $errMsg); // key : errMsg / val : $errMsg

            //회원가입 페이지로 리턴
            return "signup"._EXTENSION_PHP;
        }

    // ******* Transaction strat
            $this->model->beginTransaction();


        // user insert
        if(!$this->model->insertUser($arrPost)) {
            //예외처리 rollback
            $this->model->rollBack();
            echo "User Regist Error";
            exit();
        }
        $this->model->commit(); // 정상처리 커밋

    // ******* Transaction end

        // 로그인페이지로 이동
        return _BASE_REDIRECT."/user/login";
    }

    
    
}
?>