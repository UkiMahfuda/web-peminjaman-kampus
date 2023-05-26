function toggleNavbar() {
  const navbar = document.querySelector(".col-navbar");
  const cover = document.querySelector(".screen-cover");

  navbar.classList.toggle("d-none");
  cover.classList.toggle("d-none");
}

function toggleActive(e) {
  const sidebar_items = document.querySelectorAll(".sidebar-item");

  sidebar_items.forEach(function (v, k) {
    v.classList.remove("active");
  });
  e.closest(".sidebar-item").classList.add("active");
}

function showMessage() {
  var jam = new Date().getHours();
  var pesan;

  if (jam >= 5 && jam < 11) {
    pesan = "Selamat Pagi, ";
  } else if (jam >= 11 && jam < 15) {
    pesan = "Selamat Siang, ";
  } else if (jam >= 15 && jam < 18) {
    pesan = "Selamat Sore, ";
  } else {
    pesan = "Selamat Malam, ";
  }

  document.getElementById("showMessage").innerHTML = pesan;
}
document.addEventListener("DOMContentLoaded", showMessage);

function validateNumber(event) {
  var keyCode = event.keyCode ? event.keyCode : event.which;
  if (keyCode < 48 || keyCode > 57) {
    event.preventDefault();
  }
}
