<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보 수정</title>
</head>
<body>
    <div class="container">
        <?php require_once("application/view/header.php")?>
        <form action="/user/myupdate" method="post">
                <div><?php echo $this->selectUserInfo["u_id"]?></div>
                <div><?php echo $this->selectUserInfo["u_name"]?></div>
                <input type="password" name="pw" id="pw" placeholder="패스워드를 입력하세요">
                <span>
                <?php if(isset($this->arrError["pw"])) {
                        echo $this->arrError["pw"];
                    }?>
                </span>
                <!-- <input type="password" name="pwChk" id="pwChk" placeholder="pwChk"> -->
                <!-- <span>
                <?php //if(isset($this->arrError["pwChk"])) {
                        //echo $this->arrError["pwChk"];
                    //}?>
                </span> -->
                <button type="submit">수정</button>
                <button type-"button">탈퇴</button>
            </form>
            <a href="/shop/main">취소</a>
    </div>
    
</body>
</html>