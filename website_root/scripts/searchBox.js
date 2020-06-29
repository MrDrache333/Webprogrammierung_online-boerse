document.getElementById("searchBox_what").addEventListener("keyup", function () {
    if (!isValidInput(this.value)) {
        alert("Deine Suche ist ungültig.\nBitte verwende nur: Großbuchstaben, Kleinbuchstaben, Nummern, Umlaute bis zu einer Länge von max. 50 Zeichen")
        this.value = "";
    } else
        showHint(this.value, 0)
})
document.getElementById("searchBox_where").addEventListener("keyup", function () {
    if (!isValidInput(this.value)) {
        alert("Deine Suche ist ungültig.\nBitte verwende nur: Großbuchstaben, Kleinbuchstaben, Nummern, Umlaute bis zu einer Länge von max. 50 Zeichen")
        this.value = "";
    } else
        showHint(this.value, 1)
})

function isValidInput(input) {
    return RegExp(/^([\wöäüÖÄÜß(/)\s]){0,50}$/u).test(input);
}

function showHint(str, rowIndex) {
    if (str.length === 0) {
        document.getElementById("liveSearch_" + rowIndex).innerHTML = "";
        document.getElementById("liveSearch_" + rowIndex).style.border = "0px";
        return;
    }
    const xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("liveSearch_" + rowIndex).innerHTML = this.responseText;
            document.getElementById("liveSearch_" + rowIndex).style.border = "1px solid #A5ACB2";
        }
    }
    xmlHttp.open("GET", "getHint.php?q=" + str + "&i=" + rowIndex, true);
    xmlHttp.send();
}