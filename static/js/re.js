function ijuemadre(urla) {
  alert("Se abrirá en una nueva pestaña.");
  window.open(
    "https://ipgeolocation.io/ip-location/" + urla,
    "Viendo: " + urla
  );
}

function info_d(url, acor) {
  alert(
    `Este acortador lleva a la URL: ${url}\nAccede a él a través de: ${acor}`
  );
}
function ntrack() {
  let totrack = prompt("Ingrese su codigo de rastreo:");
  if (totrack.length > 0) {
    window.location.href = "track?code=" + totrack;
  }
}
document.addEventListener("DOMContentLoaded", function () {
  const button = document.getElementById("menuhamburguesa");
  const menudo = document.getElementById("itemsdo");
  button.addEventListener("click", function () {
    menudo.classList.toggle("hidden");
  });
});
