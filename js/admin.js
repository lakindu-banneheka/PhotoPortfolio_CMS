document.addEventListener("DOMContentLoaded", function() {
    var popup = document.getElementById("popupForm");
    var openBtn = document.getElementById("openPopupBtn");
    var closeBtn = document.getElementById("closePopupBtn");

    openBtn.onclick = function() {
        popup.style.display = "block";
    }

    closeBtn.onclick = function() {
        popup.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == popup) {
            popup.style.display = "none";
        }
    }
});
