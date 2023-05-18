<?php



?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/application/view/CSS/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sigmar&display=swap" rel="stylesheet">
    <title>Header</title>
</head>
<body>
    <div class="container">
        <div class="d-flex flex-column flex-md-row align-items-center pb-1 mb-4 border-bottom">
            <a href="/shop/main" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-1" id="logo">BBobbi</span>
            </a>
            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <?php
                if(!isset($_SESSION[_STR_LOGIN_ID])) {
                ?><a class="me-3 py-2 text-dark text-decoration-none nav-a1" href="/user/login">로그인</a>
                <a class="me-3 py-2 text-dark text-decoration-none nav-a2" href="/user/signup">회원가입</a>
            <?php
                }
                else {
                    ?>
                    <p><?php echo '안녕하세요 '.$_SESSION[_STR_LOGIN_ID].' 님' ?></p>
                    <a href="/user/logout" id="logout">로그아웃</a>
                    <!-- Todo 마이페이지 수정에서 로그아웃 안됨!!!!!!!!! -->
                    <a class="me-3 py-2 text-dark text-decoration-none nav-a3" href="/user/myupdate">회원정보 수정</a>
            <?php
                }
            ?>
            <a class="py-2 text-dark text-decoration-none nav-a4" href="#">
                <img src="http://phonecloset.kr/_dj/img/s69_top_shop_icon_03.jpg" alt="장바구니">
            </a>
            </nav>
        </div>
    </div>
</body>
</html>