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