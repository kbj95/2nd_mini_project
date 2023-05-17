function chkDuplicationId(){
    const id = document.getElementById("id");

    const url = "/api/user?id=" + id.value;

    // API
    fetch(url)
    .then(data => {
        // Response Status 확인 (200번 외에는 에러 처리)
        if(data.status !== 200){
            throw new Error(data.status + ' : API Response Error');
        }
        return data.json();
    })
    .then(apiData => {
        const idChkPop = document.getElementById("idPop");
        if(apiData["flg"] === "1"){
            idChkPop.innerHTML = apiData["msg"];
            idChkPop.style.color = "red";
        }
        else if(id.value.length < 3 || id.value.length > 12)
        {
            idChkPop.innerHTML = "ID는 3~12글자로 입력해주세요.";
            idChkPop.style.color = "red";
        }
        else if(apiData["flg"] === "2"){
            idChkPop.innerHTML = apiData["msg"];
            idChkPop.style.color = "red";
        }
        else{
            idChkPop.innerHTML = "사용가능한 아이디입니다.";
            idChkPop.style.color = "green";
        }
    })
    // 에러는 alert로 처리
    .catch(error => alert(error.message));
}

function pwReChk(){
    const pw = document.getElementById("pw").value;
    const pwChk = document.getElementById("pwChk").value;
    const pwChkErr = document.getElementById("pwChkErr");

    if(pw === pwChk){
        pwChkErr.innerHTML = "비밀번호와 일치합니다.";
        pwChkErr.style.color = "green";
    }
    else{
        pwChkErr.innerHTML = "비밀번호와 일치하지않습니다.";
        pwChkErr.style.color = "red";
    }

}