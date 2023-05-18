<?php
    $myInfo = $this->myIdSelect();
    // var_dump($myInfo);

    // 로그인이 되어 있을 경우
    $flg_login = isset($_SESSION[_STR_LOGIN_ID]) ? "logout" : "login";
    $flg_name = isset($_SESSION["u_name"]) ? $_SESSION["u_name"] : "";
    $flg_name_sub = isset($_SESSION["u_name"]) ? "님" : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/application/view/CSS/common.css">
    <link rel="stylesheet" href="/application/view/CSS/mypage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Mypage</title>
</head>
<body>
    <?php require_once(_PATH_VIEW._FILE_NAME_HEADER._EXTENSTION_PHP); ?>
    <div id="wrap" class="d-flex">
        <?php require_once(_PATH_VIEW._FILE_NAME_SIDE._EXTENSTION_PHP); ?>
        <form action="/user/mypage" method="POST">
            <ul>
                <li>
                    <input type="hidden" name="no" value="<?php echo $myInfo["u_no"] ?>">
                </li>
                <li class="uId">                    
                    <?php echo $myInfo["u_id"] ?> 님의 회원정보
                </li>
                <li class="border-top my-3"></li>
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
                    <div id="pwChkErr">비밀번호확인을 입력해주세요.</div>
                </li>
                <li>
                    <label for="name">NAME</label>
                    <input type="text" name="name" id="name" value="<?php if(isset($this->arrInput["nameInput"])){echo $this->arrInput["nameInput"];}else
                    { echo $myInfo["u_name"];} ?>">
                    <div id="namePop">
                        <?php if(isset($this->arrError["name"])){ echo $this->arrError["name"]; }
                        ?>
                    </div>
                </li>
                <li>
                    <label for="phoneNum">PHONE</label>
                    <input type="tel" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="phoneNum" id="phoneNum" required placeholder="-를 제외하고 적어주세요" maxlength="11" value="<?php if(isset($this->arrInput["phoneInput"])){echo $this->arrInput["phoneInput"];}else
                    { echo $myInfo["u_phone_num"];} ?>">
                    <div id="phonePop">
                        <?php if(isset($this->arrError["phoneNum"])){ echo $this->arrError["phoneNum"]; } ?>
                    </div>
                </li>
            </ul>
            <div id="btnBox">
                <button type="submit" class="btn btn-success">수정하기</button>
                <button type="button" class="btn btn-success"><a href="/user/mypage">다시쓰기</a></button>
                <a href="/shop/main" class="btn btn-success">취소하기</a>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">탈퇴하기
                </button>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="/user/out" method="get">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="no" value="<?php echo $myInfo["u_no"] ?>">
                <div class="modal-body">
                    정말 탈퇴하시겠습니까?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">닫기</button>
                    <button type="submit" class="btn btn-success">탈퇴하기</button>
                </div>
                </div>
            </div>
        </form>
    </div>

    <!-- 팝업 -->
        <!-- <div id="outPop" class="d-none">
            <form action="/user/out" method="get">
                <p>탈퇴하시겠습니까?</p>
                <button type="submit">탈퇴하기</button>
                <button type="button" onclick="outPop();">취소</button>
            </form>
        </div> -->

    <script src="/application/view/JS/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</body>
</html>