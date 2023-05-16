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
    <title>List</title>
</head>
<body>


    <div class="container">
        <?php require_once("application/view/header.php")?>
        <!-- 캐러셀 -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://168cm.kr/web/upload/category/editor/2023/05/01/1f4bbba557e8e911cc273262b0b20921.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://168cm.kr/web/upload/category/editor/2023/05/08/ac133ea5fdf53876057a0279b7d4dc03.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="http://phonecloset.kr/_dj/img/s71_main_spe_img2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- 카드 -->
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-5">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <img src="https://image.kyobobook.co.kr/newimages/giftshop_new/goods/400/1037/hot1680701906696.jpg" class="card-img-top" alt="상품">
                                <h5 class="card-title">맹구 폰케이스</h5>
                                <p class="card-text">완전 짱 귀여운 맹구 케이스!!</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Buy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <img src="https://image.kyobobook.co.kr/newimages/giftshop_new/goods/400/1037/hot1680701906696.jpg" class="card-img-top" alt="상품">
                                <h5 class="card-title">맹구 폰케이스</h5>
                                <p class="card-text">완전 짱 귀여운 맹구 케이스!!</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Buy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <img src="https://image.kyobobook.co.kr/newimages/giftshop_new/goods/400/1037/hot1680701906696.jpg" class="card-img-top" alt="상품">
                                    <h5 class="card-title">맹구 폰케이스</h5>
                                    <p class="card-text">완전 짱 귀여운 맹구 케이스!!</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Buy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                            <div class="card shadow-sm">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <img src="https://image.kyobobook.co.kr/newimages/giftshop_new/goods/400/1037/hot1680701906696.jpg" class="card-img-top" alt="상품">
                                        <h5 class="card-title">맹구 폰케이스</h5>
                                        <p class="card-text">완전 짱 귀여운 맹구 케이스!!</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Buy
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <img src="https://image.kyobobook.co.kr/newimages/giftshop_new/goods/400/1037/hot1680701906696.jpg" class="card-img-top" alt="상품">
                                    <h5 class="card-title">맹구 폰케이스</h5>
                                    <p class="card-text">완전 짱 귀여운 맹구 케이스!!</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Buy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <img src="https://image.kyobobook.co.kr/newimages/giftshop_new/goods/400/1037/hot1680701906696.jpg" class="card-img-top" alt="상품">
                                    <h5 class="card-title">맹구 폰케이스</h5>
                                    <p class="card-text">완전 짱 귀여운 맹구 케이스!!</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Buy
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Button trigger modal
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button> -->
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">장바구니에 해당상품을 추가하겠습니까?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn_cancel" data-bs-dismiss="modal">취소</button>
                <button type="button" class="btn btn-primary btn_cart">장바구니 담기</button>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        function redirectLogout() {
            location.href = "/user/logout";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>