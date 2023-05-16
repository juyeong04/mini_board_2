function chkDuplicationId() {
    const url = "/api/user?id=" + id.value;
    let apiData = null;

    // API
    fetch(url)
    .then(data => {return data.json()})
    .then(apiData => {
        const idspan = document.getElementById('errMsgId');
        if(apiData["flg"] === "1") {
            idspan.innerHTML = apiData["msg"]
        } else { 
            idspan.innerHTML = "";
        }
    });

}