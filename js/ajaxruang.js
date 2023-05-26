var searchruang = document.getElementById("searchruang");
var btnsearchruang = document.getElementById("btnsearchruang");
var tblruang = document.getElementById("tblruang");

// searchruang.addEventListener("mouseover", function () {
//   alert("Berhasil");
// });

searchruang.addEventListener("keydown", function () {
  //buat object ajax
  var ajax = new XMLHttpRequest();

  //cek ajax
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      tblruang.innerHTML = ajax.responseText;
    }
  };

  //jalankan ajax
  ajax.open("GET", "ajaxruang.php?searchruang=" + searchruang.value, true);
  ajax.send();
});
