<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/CSS/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <h1><a href="/user/login">LOGIN</a></h1>    
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