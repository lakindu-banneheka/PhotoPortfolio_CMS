document.addEventListener('DOMContentLoaded', (event) => {
    var modal = document.getElementById("myModal");
    var closeButton = document.querySelector(".close");

    // Ensure modal is hidden on page load
    modal.style.display = "none";

    // Close the modal when clicking outside the modal content
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Close the modal when the 'x' button is clicked
    closeButton.addEventListener('click', function() {
        closeModal();
    });
});

function openModal(imageSrc, captionText) {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("modalImg");
    var caption = document.getElementById("caption");

    modal.style.display = "flex";
    modalImg.src = imageSrc;
    caption.innerHTML = captionText;
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}