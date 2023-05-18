<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/CSS/common.css">
    <link rel="stylesheet" href="/application/view/CSS/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <h1>
        <a href="/shop/main">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16" style="color:#308752;">
                <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
                </svg>
                <span class="fs-2 fw-semibold">SHOP</span>
        </a>
    </h1>    
    <form action="/user/login" method = "post">
        <div class="login_box">
            <input type="text" id="id" name="id" placeholder="아이디" autocomplete="off" maxlength="12" class="idfocus">
            <input type="password" id="pw" name="pw" placeholder="비밀번호" autocomplete="off" class="pwfocus">
        </div>
        <div class="loginBtn_box">
            <button type="submit" class="btn btn-outline-success">LOGIN</button>
            <hr>
            <div class="login_subBox">
                <a class="login_a">아이디찾기</a>
                <span>|</span>
                <a class="login_a">비밀번호찾기</a>
                <span>|</span>
                <a class="login_a" href="/user/join">회원가입</a>
                <!-- error -->
                <p><?php echo isset($this->errMsg)? $this->errMsg : ""; ?></p>
            </div>
        <div>
    </form>

    <script src="/application/view/JS/login.js"></script>
</body>
</html>