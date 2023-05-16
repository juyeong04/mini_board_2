<?php
namespace application\util;

class UrlUtil {

    // $_GET["url"]을 분석해서 리턴
    public static function getUrl() {
        return isset($_GET["url"]) ? $_GET["url"] : ""; // url : 아파치에서 설정해준 대로 index.php 다음 오는 (subdirectory) user/login이 겟값으로 넘어옴
    }

    // URL을 "/"로 구분해서 배열을 만들고 리턴
    public static function getUrlArrPath() {
        $url = UrlUtil::getUrl(); // static으로 선언된 프로퍼티에 한해서 ::로 사용 가능 (static 쓰는 이유 : static 쓰는 순간 인스턴스화 안해도 메모리에 올라가있음 ==> refresh 해도 값 안날라감, 수정 불가능 하게 하려고 )
        return $url !== "" ? explode("/",$url) : "";
    }


    // "/"를 "\\"로 치환해주는 메소드
    public static function replaceSlashToBackslash($str) {
        return str_replace("/","\\",$str);
    }

}



?>