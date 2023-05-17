<?php
namespace application\controller;

// 다른페이지로 이동하면 정보가 날아가기 때문에, 정보 날리지 않고 아이디 중복 체크하기 위해서 api사용
class ApiController extends Controller {
    public function userGet() {
        $arrGet = $_GET;
        $arrData = ["flg" => "0"];

        // User model 호출 : Apicontroller에서는 ApiModel만 쓸수 있는데 Usermodel 쓰기 위해서 불러옴
        $this->model = $this->getModel("User");

        $result = $this->model->getUser($arrGet,false);

        if(count($result) !== 0) {
            $arrData["flg"] = "1";
            $arrData["msg"] = "입력하신 ID가 사용중입니다";
        }

        // 배열을 JSON으로 변경
        $json = json_encode($arrData);
        header('Content-type: application/json');
        echo $json;
        exit();
    }
}

?>