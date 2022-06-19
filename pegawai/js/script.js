(function () {
    'use strict'
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl)
    })
  })()

document.querySelector("#tambah").addEventListener("click", function() {
    document.querySelector(".popup-tambah").classList.add("active");
});
document.querySelector("#batal").addEventListener("click", function() {
    document.querySelector(".popup-tambah").classList.remove("active");
});