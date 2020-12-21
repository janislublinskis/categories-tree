function openModal(id) {

    var modal = document.getElementById(id);
    modal.style.display = "block";

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

var cat = $("div.category");
cat.next("ul").css("display", "none");

function myFunction(id) {
    var cat = $("#" + id).next("ul");
    if (cat.css('display') === "none") {
        cat.css('display', 'block');
    } else {
        cat.css('display', 'none');
    }
}