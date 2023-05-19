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
        <div><?php echo $this->selectUserInfo["u_id"]?></div>
        <div><?php echo $this->selectUserInfo["u_name"]?></div>
        <form action="/user/myupdate" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $this->selectUserInfo["u_id"]?>">
            <input type="hidden" name="name" id="name" value="<?php echo $this->selectUserInfo["u_name"]?>">
                <input type="password" name="pw" id="pw" placeholder="패스워드를 입력하세요">
                <span>
                <?php if(isset($this->arrError["pw"])) {
                        echo $this->arrError["pw"];
                    }?>
                </span>
                <button type="submit">수정</button>
                <button type="button" id="delUser" onclick="delUserInfo();">탈퇴</button>
            </form>
            <a href="/shop/main">취소</a>
    </div>

    <script src="/application/view/js/common.js"></script>
</body>
</html>