const modal = document.getElementById("customModal");
const openModalButtons = document.querySelectorAll(".openModalBtn");
const closeModalBtn = document.querySelector(".close-btn");

openModalButtons.forEach(button => {
    button.onclick = function () {
        modal.style.display = "block";
    }
});

closeModalBtn.onclick = function () {
    modal.style.display = "none";
}
l
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
