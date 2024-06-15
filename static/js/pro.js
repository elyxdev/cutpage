function copiarAlPortapapeles(texto) {
    var input = document.createElement("input");
    input.value = texto;
    input.setAttribute("readonly", true);
    input.style.display = "none";
    document.body.appendChild(input);
    input.select();
    document.execCommand("copy");
    input.remove();
    alert("Copiado al portapapeles!");
      
    
}

function ijuemadre(urla) {
    alert("Se abrira en una nueva pestaña.");
    window.open('https://ipgeolocation.io/ip-location/'+urla, 'Viendo: '+urla)
}