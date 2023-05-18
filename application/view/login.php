<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/CSS/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php require_once("application/view/header.php")?>
        <div class="form-wrapper">
            <h2>로그인</h2>
            <p style="color: red; text-align:center; font-weight:900;">
            <?php
            echo isset($this->errMsg) ? $this->errMsg : "";
            ?>
            </p>
            <!-- / root에서 시작한다는 뜻(htdocs), 안 적어주면 url이 뒤에 추가돼서 계속 불어남 -->
            <form action="/user/login" method="post">
                <div class="form-item">
                <label for="id"></label>
                <input type="text" name="id" required="required" placeholder="ID" maxlength="12"></input>
                </div>
                <div class="form-item">
                <label for="pw"></label>
                <input type="password" name="pw" required="required" placeholder="Password" maxlength="20"></input>
                <span class="errMsg">
                    <?php if(isset($this->arrError["pw"])) {
                            echo $this->arrError["pw"];
                        }?>
                    </span>
                </div>
                <div class="button-panel">
                <input type="submit" class="button" title="Sign In" value="로그인"></input>
                </div>
                <div class="form-footer">
                    <p><a href="/shop/main" class="btn_main">메인 페이지</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>