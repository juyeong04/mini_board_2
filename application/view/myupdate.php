<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보 수정</title>
</head>
<body>
    <form action="/user/myupdate" method="post">
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
    
</body>
</html>