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
    <h1><a href="/user/join">MEMBERSHIP</a></h1>
    <form method="POST" action="/user/join">
        <ul>
            <li>
                <label for="id">ID</label>
                <input id="id" name="id" type="text" required autocomplete="off"> 
                <button type="button" class="btn btn-success" onclick="chkDuplicationId();">중복확인</button>
                <!-- ID가 규칙에 맞는지 확인 -->
                <?php if(isset($this->arrError["id"])){ ?>
                    <div><?php echo $this->arrError["id"] ?></div>
                <?php } ?>
                <!-- ID 중복확인 -->
                <div id="idPop" class="d-none">
                    <?php if(isset($this->errMsg)){ echo $this->errMsg; }
                    ?>
                    
                </div>
            </li>
            <li>
                <label for="pw">PW</label>
                <input type="password" name="pw" id="pw" required autocomplete="off">
                <?php if(isset($this->arrError["pw"])){ ?>
                    <span><?php echo $this->arrError["pw"] ?></span>
                <?php } ?>
            </li>
            <li>
                <label for="pwChk">비밀번호 확인</label>
                <input type="password" name="pwChk" id="pwChk" required autocomplete="off">
                <br>
                <?php if(isset($this->arrError["pwChk"])){ ?>
                    <span><?php echo $this->arrError["pwChk"] ?></span>
                <?php } ?>
            </li>
            <li>
                <label for="name">name</label>
                <input type="text" name="name" id="name" required autocomplete="off">
                <?php if(isset($this->arrError["name"])){ ?>
                    <span><?php echo $this->arrError["name"] ?></span>
                <?php } ?>
            </li>
            <li>
                <label for="adress">adress</label>
                <input type="text" name="adress" id="adress" autocomplete="off">
            </li>
            <li>
                <label for="phoneNum">phone</label>
                <input type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="phoneNum" id="phoneNum" placeholder="-를 제외하고 적어주세요" maxlength="11">
            </li>
            <li>
                <label for="email">email</label>
                <input type="email" name="email" id="email" autocomplete="off">
            </li>
            <li>
                <button type="submit" class="btn btn-success">가입하기</button>
            </li>
        </ul>
    </form>
    

    <script src="/application/view/JS/common.js"></script>
</body>
</html>