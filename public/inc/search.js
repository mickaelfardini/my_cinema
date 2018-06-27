/*jslint browser */
window.onload = function () {
    "use strict";
    var textbar = document.getElementById("SearchMember");
    var table = document.getElementsByTagName("tbody");

    var text = "";

    textbar.onkeyup = function () {
        text = textbar.value;
    }
    var i = 0;
};