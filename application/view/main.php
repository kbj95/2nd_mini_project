<?php
    // 로그인이 되어 있을 경우
    $flg_login = isset($_SESSION[_STR_LOGIN_ID]) ? "logout" : "login";
    $flg_name = isset($_SESSION[_STR_LOGIN_NAME]) ? $_SESSION[_STR_LOGIN_NAME] : "";
    $flg_name_sub = isset($_SESSION[_STR_LOGIN_NAME]) ? "님" : "";

    // $arr_item = $this->item();
    // var_dump($arr_item);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/CSS/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>SHOPPING MALL</title>
</head>
<body>
    <?php require_once(_PATH_VIEW._FILE_NAME_HEADER._EXTENSTION_PHP); ?>
    <div id="wrap" class="d-flex">
        <!-- sideBar -->
        <?php require_once(_PATH_VIEW._FILE_NAME_SIDE._EXTENSTION_PHP); ?>
        <main>
            <!-- <div id="top" class="d-none d-sm-block">
                <span id="iconBox">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16" style="margin-top: 15px;">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                    </svg>
                </span>
                <div class="searchBox">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div> -->
            <!-- slide -->
            <div id="slideArea">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/application/view/img/1.jpg" alt="slide1">
                        </div>
                        <div class="carousel-item">
                            <img src="/application/view/img/2.jpg" alt="slide2">
                        </div>
                        <div class="carousel-item">
                            <img src="/application/view/img/3.jpg" alt="slide3">
                        </div>
                        <div class="carousel-item">
                            <img src="/application/view/img/4.jpg"  alt="slide4">
                        </div>
                    </div>
                </div>
            </div>
            <!-- items -->
            <div class="container text-center">
                <div class="row row-cols-xxl-4 row-cols-lg-3">
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="item">
                            <div class="card-body">
                                <h5 class="card-title">카라티</h5>
                                <p class="card-text">18,000원</p>
                                <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="item">
                            <div class="card-body">
                                <h5 class="card-title">카라티</h5>
                                <p class="card-text">18,000원</p>
                                <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="item">
                            <div class="card-body">
                                <h5 class="card-title">카라티</h5>
                                <p class="card-text">18,000원</p>
                                <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="item">
                            <div class="card-body">
                                <h5 class="card-title">카라티</h5>
                                <p class="card-text">18,000원</p>
                                <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="item">
                            <div class="card-body">
                                <h5 class="card-title">카라티</h5>
                                <p class="card-text">18,000원</p>
                                <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="item">
                            <div class="card-body">
                                <h5 class="card-title">카라티</h5>
                                <p class="card-text">18,000원</p>
                                <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="item">
                            <div class="card-body">
                                <h5 class="card-title">카라티</h5>
                                <p class="card-text">18,000원</p>
                                <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="item">
                            <div class="card-body">
                                <h5 class="card-title">카라티</h5>
                                <p class="card-text">18,000원</p>
                                <a href="#" class="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>