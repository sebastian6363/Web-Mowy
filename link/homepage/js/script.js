document.querySelector("#log").addEventListener("click", function() {
    document.querySelector(".p-login").classList.add("active");
});
document.querySelector(".popup .close-btn").addEventListener("click", function() {
    document.querySelector(".popup").classList.remove("active");
});