/*jslint browser */
window.onload = function () {
    "use strict";
    var textbar = document.getElementById("SearchMember");
    var tr = document.getElementsByTagName("tr");

    var text = "";

    textbar.addEventListener("keyup", function () {
        text = textbar.value;
        if (text == "") {
            for (var i = 1; i < tr.length; i++) {
                tr[i].style.display = "";
            }
        }
        else
        {
            for (var i = 1; i < tr.length; i++) {
                if (!tr[i].innerHTML.includes(text)) {
                    tr[i].style.display = "none";
                }
                else
                {
                    tr[i].style.display = "";
                }
            }
        }
    });
};