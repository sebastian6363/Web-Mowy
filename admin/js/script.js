document.querySelector("#tambah").addEventListener("click", function() {
    document.querySelector(".popup-tambah").classList.add("active");
});
document.querySelector("#batal").addEventListener("click", function() {
    document.querySelector(".popup-tambah").classList.remove("active");
});