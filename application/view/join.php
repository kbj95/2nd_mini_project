<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/CSS/join.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>회원가입</title>
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
    <form method="POST" action="/user/join">
        <ul>
            <li>
                <label for="id">ID</label>
                <input id="id" name="id" type="text" autocomplete="off" placeholder="영문,숫자를 포함한 3~12" value="<?php if(isset($this->arrInput["idInput"])){echo $this->arrInput["idInput"];} ?>">
                <button type="button" class="btn btn-success" onclick="chkDuplicationId();">중복확인</button>
                <!-- 중복확인 -->
                <div id="idPop"><?php if(isset($this->arrError["id"])){echo $this->arrError["id"];} ?>
                </div>
            </li>
            <li>
                <label for="pw">PW</label>
                <input type="password" name="pw" id="pw" autocomplete="off" placeholder="영문,숫자,특수문자(!,@,*)포함 8~20" oninput="pwReChk();">
                <div id="pwPop">
                    <?php if(isset($this->arrError["pw"])){echo $this->arrError["pw"];} ?>
                <div>
            </li>
            <li>
                <label for="pwChk">비밀번호 확인</label>
                <input type="password" name="pwChk" id="pwChk" autocomplete="off" oninput="pwReChk();">
                <br>
                <div id="pwChkErr">비밀번호확인을 입력해주세요.</div>
            </li>
            <li>
                <label for="name">name</label>
                <input type="text" name="name" id="name" autocomplete="off" value="<?php if(isset($this->arrInput["nameInput"])){echo $this->arrInput["nameInput"];} ?>">
                <div id="namePop">
                    <?php if(isset($this->arrError["name"])){ echo $this->arrError["name"]; }
                    ?>
                </div>
            </li>
            <li>
                <label for="phoneNum">phone</label>
                <input type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="phoneNum" id="phoneNum" required placeholder="-를 제외하고 적어주세요" maxlength="11" value="<?php if(isset($this->arrInput["phoneInput"])){echo $this->arrInput["phoneInput"];} ?>">
            </li>
            <li>
                <div class="btnBox">
                    <button type="submit" class="btn btn-success">가입하기</button>
                    <a href="/user/join" class="btn btn-success">다시쓰기</a>
                    <a href="/user/login" class="btn btn-success px-4">취소</a>
                </div>
            </li>
        </ul>
    </form>
    

    <script src="/application/view/JS/common.js"></script>
</body>
</html>