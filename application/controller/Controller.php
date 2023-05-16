<?php
// view, model 호출

namespace application\controller;

use application\util\UrlUtil;

// ** 동적속성 : 미리 field에 선언해주지 않고 바로 바로 추가해서 만들어줄수 있음 / 동적속성 사용 안할때는 필드에 선언해주면 됨
use \AllowDynamicProperties; // 동적 속성 쓸때 적어야 하는거(8버전 부터는 권장사항이 아님)
#[AllowDynamicProperties] // 동적 속성 쓸때 적어야 하는거(8버전 부터는 권장사항이 아님)

class Controller {
    protected $model;
    private static $modelList = [];
    private static $arrNeedAuth = ["product/list"];// 인증 필요한 페이지(로그인 안하면 못가게 만듦)

    // 생성자
    // $identityName : User, $action(메소드명) : loginGet
    public function __construct($identityName, $action) {
        
        // session start
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

        // model class 호출
        $this->model = $this->getModel($identityName);

        // controller의 메소드 호출 (usercontroller에 있는 loginGet 불러옴)
        $view = $this->$action(); // $action() = loginGet(UserController에 있는 loginGet함수 호출) / $view = login.php

        if(empty($view)) {
            echo "해당 Controller에 메소드가 없습니다. : ".$action;
            exit();
        }
        // view 호출
        require_once $this->getView($view); // getView(login.php) = application/view/login.php ==> require_once해줌
    }

    // model 호출하고 결과를 리턴
    protected function getModel($identityName) {
        // model 생성 체크
        if(!in_array($identityName, self::$modelList)) { // private 설정 돼있기 때문에 self 사용!/ public, protected로 $modelList가 설정돼있으면 ==> usercontroller에서 $this로 접근 가능 / private로 설정돼있기 때문에 parent로도 접근 불가능!!!!
            $modelName = UrlUtil::replaceSlashToBackslash(_PATH_MODEL.$identityName._BASE_FILENAME_MODEL); // application/model/UserModel ==> 백슬러시->슬러시 변경
            self::$modelList[$identityName] = new $modelName(); // model class 호출, $modelList[$identityName] = application\model\UserModel
        }
        return self::$modelList[$identityName]; // $modelList[$identityName] = application\model\UserModel
    }

    // 파라미터를 확인해서 해당하는 view를 리턴하거나, redirect
    protected function getView($view) {
        // view를 체크
        if(strpos($view, _BASE_REDIRECT) === 0) { // _BASE_REDIRECT값 없어서 false ==> if 실행 안됨
            header($view);
            exit();
        }
        return _PATH_VIEW.$view; // application/view/login.php
    }

    // 동적 속성(DynamicProperty)를 셋팅하는 메소드
    protected function addDynamicProperty($key, $val) {
        $this->$key = $val;
    }

    // 유저 권한 체크 메소드
    protected function chkAuthorization() {
        $urlPath = UrlUtil::getUrl();
        foreach(self::$arrNeedAuth as $authPath) {
            if(!isset($_SESSION[_STR_LOGIN_ID]) && strpos($urlPath, $authPath) === 0) {
                header(_BASE_REDIRECT."/user/login"); 
                exit();
            }
        }
    }
}


?>