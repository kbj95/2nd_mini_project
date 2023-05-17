<?php
    // 로그인이 되어 있을 경우
    $flg_login = isset($_SESSION[_STR_LOGIN_ID]) ? "logout" : "login";
    $flg_name = isset($_SESSION["u_name"]) ? $_SESSION["u_name"] : "";
    $flg_name_sub = isset($_SESSION["u_name"]) ? "님" : "";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/CSS/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>SHOPPING MALL</title>
</head>
<body>
    <!-- navBar -->
    <nav class="navbar bg-light navbar-expand-sm sticky-top d-sm-none">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <div id="wrap" class="d-flex">
        <!-- sideBar -->
        <aside class="sticky-top">
            <div class="flex-shrink-0 p-3 bg-white d-none d-sm-block" style="width: 280px;">
                <a href="/shop/main" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16" style="color:#308752;">
                    <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                    </svg>
                    <span class="fs-2 fw-semibold">&nbsp;SHOP</span>
                </a>
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true" id="btnOuter">
                        &nbsp;&nbsp;&nbsp;OUTER
                        </button>
                        <div class="collapse show" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">자켓</a></li>
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">코트</a></li>
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">가디건</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false" id="btnShirts">
                        &nbsp;&nbsp;&nbsp;TOP
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">티셔츠</a></li>
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">맨투맨/후드</a></li>
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">블라우스</a></li>
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">니트</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false" id="btnPants">
                        &nbsp;&nbsp;&nbsp;PANTS
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">데님</a></li>
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">슬랙스</a></li>
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">레깅스</a></li>
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">치마</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="border-top my-3"></li>                      
                    <span class="fcGreen"><?php echo $flg_name ?></span>
                    <span><?php echo $flg_name_sub ?></span>
                    <li class="mb-1">
                        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false" id="btnUser">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            &nbsp;&nbsp;Account
                        </button>
                        <div class="collapse" id="account-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">Cart</a></li>
                                <li><a href="/user/mypage" class="link-dark d-inline-flex text-decoration-none rounded my-1">My page</a></li>
                                <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded my-1">Setting</a></li>
                                <li><a href="/user/<?php echo $flg_login ?>" class="link-dark d-inline-flex text-decoration-none rounded my-1"><?php echo $flg_login ?></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- main -->
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
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center pt-3">
                        <div class="card" style="width:26rem;">
                            <img src="https://static.discovery-expedition.com/images/goods/ec/X23SDMTS71033KAL/thnail/E737C2D19EFF44E1852150BE1F2EF70E.png/dims/resize/738x982"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                    card's
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
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