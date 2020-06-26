function char_count() {
    //Über die DOM-Methode document.getElementById wird der Wert aus dem Eingabefeld geholt
    //und der Variablen val zugewiesen.
    var val = document.getElementById('newPassword').value;

    //Anschließend wird über die selbe DOM-Methode ein Referenzpunkt für das Feedback erzeugt
    //und in der Variablen call gespeichert.
    var call = document.getElementById('feedback');

    //Ab hier beginnt die Prüfung.
    //Das Passwort ist entweder zu kurz, unsicher, sicher oder sehr sicher

    //Ist das Passwort wenigstens 5 Zeichen lang?
    if (val.length > 4) {

        //Wenn das Passwort neben Buchstaben zusätzlich wenigstens eine Zahl
        //und ein Sonderzeichen enthält, ist es "sehr sicher".
        if (val.match(/\d{1,}/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/) && val.match(/\W/)) {
            call.style.color = "#428c0d";
            call.innerHTML = "<strong>sehr sicher!</strong>";
        }

        //Wenn das Passwort nur eine Zahl oder ein Sonderzeichen enthält, ist es "sicher"?
        else if (val.match(/\d{1,}/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/) || val.match(/\W/) && val.match(/[a-zA-ZäöüÄÖÜ]{1,}/)) {
            call.style.color = "#56a40c";
            call.innerHTML = "<strong>sicher!</strong>";
        } else //Hier enthält das Passwort weder Ziffern noch Sonderzeichen und ist somit "unsicher".
        {

            call.style.color = "#ff9410";
            call.innerHTML = "<strong>unsicher!</strong>";
        }
    } else //Hier enthält das Passwort nicht mal die erforderlichen 5 Zeichen und ist daher "zu kurz"
    {
        call.style.color = "#ff352c";
        call.innerHTML = "<strong>zu kurz!</strong>";
    }
};