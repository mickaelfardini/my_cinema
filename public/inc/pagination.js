/*jslint browser */
window.onload = function () {
    "use strict";
    var active = document.getElementsByClassName("page-item active");
    var page = document.getElementsByClassName("page-item");
    var activeID = parseInt(active[0].id);

    var i = 0;
    for (i = 0; page.length; i += 1) {
        if (
            parseInt(page[i].id) < (activeID - 2) ||
            parseInt(page[i].id) > (activeID + 2)
        ) {
            page[i].style.display = "none";
        }
    }
};