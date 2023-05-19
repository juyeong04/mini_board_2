<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/CSS/login.css">
    <title>회원가입</title>
</head>
<body class="body_c">
    <div class="container">
        <?php require_once("application/view/header.php")?>
        <div class="form-wrapper">
            <h2>회원가입</h2>
            <br><br>
            <?php if(isset($this->errMsg)) { ?>
                    <div>
                        <span><?php echo $this->errMsg ?></span>
                    </div>
                <?php }?>
            <form action="/user/signup" method="post">
                <div class="form-item signup_form_item">
                    <input type="text" name="id" id="id" class="signup_id" maxlength="12" placeholder="아이디를 입력하세요" value="<?php echo (isset($this->inputData['id'])? $this->inputData['id'] : '' )?>">
                    <button type="button" class="btn_chk_id" onclick="chkDuplicationId();">중복체크</button>
                    <span id="errMsgId" class="errMsg">
                    <?php if(isset($this->arrError["id"])) {
                            echo $this->arrError["id"];
                        }?>
                    </span>
                </div>
                <div class="form-item">
                    <input type="password" name="pw" id="pw" maxlength="20" placeholder="패스워드를 입력하세요">
                    <span class="errMsg">
                    <?php if(isset($this->arrError["pw"])) {
                            echo $this->arrError["pw"];
                        }?>
                    </span>
                </div>
                <div class="form-item">
                    <input type="password" name="pwChk" maxlength="20" id="pwChk" placeholder="pwChk">
                    <span class="errMsg">
                    <?php if(isset($this->arrError["pwChk"])) {
                            echo $this->arrError["pwChk"];
                        }?>
                    </span>
                </div>
                <div class="form-item">
                    <input type="text" name="name" id="name" maxlength="30" placeholder="이름를 입력하세요" value="<?php echo (isset($this->inputData['name'])? $this->inputData['name'] : '' )?>">
                    <span class="errMsg">
                    <?php if(isset($this->arrError["name"])) {
                            echo $this->arrError["name"];
                        }?>
                    </span>
                </div>
                <div class="button-panel">
                    <button type="submit" class="button">회원가입</button>
                </div>
            </form>
            <div class="form-footer">
                <p><a href="/shop/main" class="btn_main">취소</a></p>
            </div>
        </div>
    </div>

    <script src="/application/view/js/common.js"></script>
</body>
</html>