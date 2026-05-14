document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {

      // capturamos los datos de los campos del formulario 
    let nombre = document.getElementById("nombre").value.trim(); // trim elimina espacios en blanco
    let apellidos = document.getElementById("apellidos").value.trim();
    let nivel_interes = document.getElementById("nivel_interes").value;
    let fecha_interes = document.getElementById("fecha_interes").value;
    let email = document.getElementById("email").value;

    // capturamos los elemento html donde van a aparecer los mensajes de error
    let mensaje_error_nombre = document.getElementById("error_nombre");                                                     
    let mensaje_error_apellidos = document.getElementById("error_apellidos");
    let mensaje_error_nivel_interes = document.getElementById("error_nivel_interes");
    let mensaje_error_fecha_interes = document.getElementById("error_fecha_interes");
    let mensaje_error_email = document.getElementById("error_email");
   

    // Expresiones regulares 
    let regex = /^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s-]+$/; // REGEX para letras (incluye acentos y espacios)
    let regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    let regexTelefono = /^[0-9]{9}$/; 

   // ----------- validación nombre -------------
    if (nombre === "") {
      e.preventDefault();     

      // mensaje de error       
      mensaje_error_nombre.textContent = "El nombre es obligatorio";   
      mensaje_error_nombre.style.color = "red";
      return;
    }

    if (!regex.test(nombre)) {
      e.preventDefault();       
      mensaje_error_nombre.textContent = "El nombre no puede contener números";   
      mensaje_error_nombre.style.color = "red";
      return;
    }

    if (nombre.length < 2) {
      e.preventDefault();        
      mensaje_error_nombre.textContent = "Minimo dos caracteres";   
      mensaje_error_nombre.style.color = "red";
      return;
    }

     mensaje_error_nombre.textContent = ""; // limpiamos mensaje

    // ------------ validación apellidos ---------------
    if(apellidos === ""){
     
        e.preventDefault();

        // mensaje de error
        mensaje_error_apellidos.textContent = "El campo apellidos es obligatorio"      
        return;
    }    

    if (!regex.test(apellidos)) {
      e.preventDefault();       
      mensaje_error_apellidos.textContent = "El campo apellidos no puede contener números";      
      return;
    }

    if (apellidos.length < 3) {
      e.preventDefault();        
      mensaje_error_apellidos.textContent = "Minimos tres caracteres";       
      return;
    }

    mensaje_error_apellidos.textContent = ""; // limpiamos mensaje
   
    // validar nivel de interes 
    if(nivel_interes === ""){
        e.preventDefault(); 
        mensaje_error_nivel_interes.textContent = "Por favor, indicanos tu nivel"      
        return;
    }

    mensaje_error_nivel_interes.textContent = "";

    // validar fecha interés
    if(fecha_interes === ""){
        e.preventDefault(); 
        mensaje_error_fecha_interes.textContent = "Este campo no puede quedar vacío";
        return;
    }

    mensaje_error_fecha_interes = "";

    //validar email 
    if(email === "" ){
        e.preventDefault(); 
        mensaje_error_email.textContent = "Este campo no puede quedar vacío";
        return;
    }

    mensaje_error_email = "";

    });
});