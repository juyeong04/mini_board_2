<?php

namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        
        return "login"._EXTENSION_PHP; // = login.php
    }

    // TODO : 유효성 길이 검사
    public function loginPost() {
        $arrPost = $_POST;
        $arrChkErr = [];
        $result = $this->model->getUser($_POST, true, true);
        $this->model->close(); // usermodel에서 파기 안해주고 controller에서 db 파기

        if(mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20) {
            $arrChkErr["pw"] = "PW는 8~20글자로 적으세요";
        }

    if(!empty($arrChkErr)) {
        // 에러 메세지 셋팅
        $this->addDynamicProperty('arrError', $arrChkErr);
        return "login"._EXTENSION_PHP;
    }

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
    //       유효성 체크!!
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
        // id 유효성 체크 : 영어( 소문자, 대문자, )숫자 만 가능
        $patternId = "/[^a-zA-Z0-9]/";
        if(preg_match($patternId, $arrPost["id"]) !== 0) {
            $arrChkErr["id"] = "id는 영어 소문자, 대문자, 숫자로만 적으세요";
            $arrPost["id"] = "";

        }
        

        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20) {
            $arrChkErr["pw"] = "PW는 8~20글자로 적으세요";
        }
        // TODO : PW 빈칸 체크(정규식)
        
        // 비밀번화와 비밀번호 체크 확인
        if($arrPost["pw"] !== $arrPost["pwChk"]) {
            $arrChkErr["pwChk"] = "입력하신 비밀번호가 일치하지 않습니다";
        }

        // TODO : 이름 한글 글자수제한?????????
        // name 한글만 가능 체크
        $patternName = "";
        if(preg_match($patternName, $arrPost["name"]) !== 0) {

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
        $result = $this->model->getUser($arrPost, false, false);
        if(count($result) !== 0) {
            $errMsg = "입력하신 ID가 사용중입니다";
            $this->addDynamicProperty("errMsg", $errMsg); // key : errMsg / val : $errMsg

            //회원가입 페이지로 리턴
            return "signup"._EXTENSION_PHP;
        }

        // ******* Transaction strat
                $this->model->beginTransaction();


            // User insert
            if(!$this->model->insertUser($arrPost)) { // Usermodel에서 return값 false로 넘어와서 예외처리 가능!
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

    // User info update
        public function myupdateGet() {
            $sessionId = array("id" => $_SESSION[_STR_LOGIN_ID]);
            $userInfo = $this->model->getUser($sessionId, false);// select값이 이중배열로 담겨있음 [0 => [u_id =>,u_pw => ,u_name => ] ]
            $this->addDynamicProperty("selectUserInfo", $userInfo[0]);
            // $selectUserInfo["id"] = $userInfo[0]["u_id"]; 삭제
            // $selectUserInfo["name"] = $userInfo[0]["u_name"]; 삭제
            // var_dump($sessionId, $userInfo[0], $this->selectUserInfo["u_id"]);
            $this->model->close();
            return "myupdate"._EXTENSION_PHP;
        }
        
        public function myupdatePost() {
            $arrPost = $_POST;
            $arrChkErr = [];
            // $arrPost["id"] = $_SESSION[_STR_LOGIN_ID];

            // if($arrPost["pw"] !== $arrPost["pwChk"]) {
            //     $arrChkErr["pwChk"] = "입력하신 비밀번호가 일치하지 않습니다";
            // }
            if(mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20) {
                $arrChkErr["pw"] = "PW는 8~20글자로 적으세요";
            }
            if(!empty($arrChkErr)) {
                 //에러 메세지 셋팅
                // 1. get값 안에 다시 설정 input hidden
                // 2. db에서 다시 불러올때는 post값
                // $sessionId = array("id" => $_SESSION[_STR_LOGIN_ID]);
                // $userInfo = $this->model->getUser($sessionId, false);// select값이 이중배열로 담겨있음 [0 => [u_id => ,u_pw => ,u_name => ] ]
                $this->addDynamicProperty("selectUserInfo", $arrPost);

                $this->addDynamicProperty('arrError', $arrChkErr);
                return "myupdate"._EXTENSION_PHP;
            }

            // ******* Transaction start
                $this->model->beginTransaction();
            // User update
            if(!$this->model->updateUser($arrPost)) { // Usermodel에서 return값 false로 넘어와서 예외처리 가능!
                //예외처리 rollback
                $this->model->rollBack();
                echo "User Info Update Error";
                exit();
            }
            $this->model->commit(); // 정상처리 커밋

            // ******* Transaction end

            // 로그인페이지로 이동
            return _BASE_REDIRECT."/user/login";

        }

    // 회원탈퇴
    public function withdrawGet() {
        $arrSessionId = array("id" => $_SESSION[_STR_LOGIN_ID]);

        // ******* Transaction strat
        $this->model->beginTransaction();


        // User insert
        if(!$this->model->updateDelUser($arrSessionId)) { 
            //예외처리 rollback
            $this->model->rollBack();
            echo "User Regist Error";
            exit();
        }
        $this->model->commit(); // 정상처리 커밋
        session_unset();
        session_destroy();

    // ******* Transaction end

    // 메인으로 이동
    return _BASE_REDIRECT."/shop/main";
        
    }
}
?>