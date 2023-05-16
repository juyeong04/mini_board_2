<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<body>
    <div class="container">
        <?php require_once("application/view/header.php")?>
        <span>회원가입</span>
        <br><br>
        <?php if(isset($this->errMsg)) { ?>
                <div>
                    <span><?php echo $this->errMsg ?></span>
                </div>
            <?php }?>

        <form action="/user/signup" method="post">
            <input type="text" name="id" id="id" placeholder="아이디를 입력하세요">
            <button type="button" onclick="chkDuplicationId();">중복체크</button>
            <span id="errMsgId">
            <?php if(isset($this->arrError["id"])) { 
                    echo $this->arrError["id"];
                }?>
            </span>
            <input type="password" name="pw" id="pw" placeholder="패스워드를 입력하세요">
            <span>
            <?php if(isset($this->arrError["pw"])) { 
                    echo $this->arrError["pw"];
                }?>
            </span>
            <input type="password" name="pwChk" id="pwChk" placeholder="pwChk">
            <span>
            <?php if(isset($this->arrError["pwChk"])) { 
                    echo $this->arrError["pwChk"];
                }?>
            </span>
            <input type="text" name="name" id="name" placeholder="이름를 입력하세요">
            <span>
            <?php if(isset($this->arrError["name"])) { 
                    echo $this->arrError["name"];
                }?>
            </span>
            <button type="submit">회원가입</button>
        </form>
        <a href="/shop/main">취소</a>
    </div>

    <script src="/application/view/js/common.js"></script>
</body>
</html>