document.addEventListener("DOMContentLoaded", function () {
  const button = document.getElementById("menuhamburguesa");
  const menu = document.getElementById("items");

  button.addEventListener("click", function () {
    menu.classList.toggle("hidden");
  });
});
