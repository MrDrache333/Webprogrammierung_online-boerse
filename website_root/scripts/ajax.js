function showHint(str) {
    if (str.length === 0) {
        document.getElementById("searchBox-what").innerHTML = "";
        document.getElementById("searchBox-what").style.border = "0px";
        return;
    }
    const xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("searchBox-what").innerHTML = this.responseText;
            document.getElementById("searchBox-what").style.border = "1px solid #A5ACB2";
        }
    }
    xmlHttp.open("GET", "getHint.php?q=" + str, true);
    xmlHttp.send();
}

function fillTextField(id, value) {
    document.getElementById(id).innerHTML = value;
}