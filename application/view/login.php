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
    <!-- <div class="container">
        <?php //require_once("application/view/header.php")?>
        <h1>Login</h1>
        <h3 style="color: red;
        "><?php //echo isset($this->errMsg) ? $this->errMsg : ""; ?></h3>
        <form action="/user/login" method="post">
            <label for="id">ID</label>
            <input type="text" name="id" id="id">
            <label for="pw">PW</label>
            <input type="text" name="pw" id="pw">
            <button type="submit">Login</button>
        </form>
    </div> -->
    
    <div class="form-wrapper">
        <h1>Sign In</h1>
        <h3 style="color: red; text-align:center">
        <?php echo isset($this->errMsg) ? $this->errMsg : ""; ?>
        </h3>
        <!-- / root에서 시작한다는 뜻(htdocs), 안 적어주면 url이 뒤에 추가돼서 계속 불어남 -->
        <form action="/user/login" method="post">
            <div class="form-item">
            <label for="id"></label>
            <input type="text" name="id" required="required" placeholder="ID"></input>
            </div>
            <div class="form-item">
            <label for="pw"></label>
            <input type="password" name="pw" required="required" placeholder="Password"></input>
            </div>
            <div class="button-panel">
            <input type="submit" class="button" title="Sign In" value="Sign In"></input>
            </div>
            <div class="form-footer">
                <p><a href="/shop/main">메인 페이지로</a></p>
            </div>
        </form>
    </div>
</body>
</html>