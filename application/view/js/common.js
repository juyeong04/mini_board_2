function chkDuplicationId() {
    const url = "/api/user?id=" + id.value;
    const idspan = document.getElementById('errMsgId');


    if (id.value === "") {
        idspan.innerHTML = "ID를 입력해주세요";
        return;
        }

    // API
    fetch(url)
    .then(data => {return data.json()})
    .then(apiData => {
        if(apiData["flg"] === "1") {
            idspan.innerHTML = apiData["msg"]
        }
        else if(apiData["flg"] === "2") {
            idspan.innerHTML = apiData["msg"]
        }
    });
    
}

function delUserInfo() {
    alert("탈퇴 되었습니다");
    location.href = "/user/withdraw";
}