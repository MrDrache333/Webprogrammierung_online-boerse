function showHint(str, id) {
    if (str.length === 0) {
        document.getElementById("liveSearch_" + id).innerHTML = "";
        document.getElementById("liveSearch_" + id).style.border = "0px";
        return;
    }
    const xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("liveSearch_" + id).innerHTML = this.responseText;
            document.getElementById("liveSearch_" + id).style.border = "1px solid #A5ACB2";
        }
    }
    xmlHttp.open("GET", "getHint.php?q=" + str + "&i=" + id, true);
    xmlHttp.send();
}