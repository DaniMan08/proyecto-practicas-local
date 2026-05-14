document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {

      // capturamos los datos de los campos del formulario 
    let nombre = document.getElementById("nombre").value.trim(); // trim elimina espacios en blanco
    let password = document.getElementById("password").value.trim();
    let tipo = document.getElementById("tipo").value;

    // capturamos los elemento html donde van a aparecer los mensajes de error
    let mensaje_error_nombre = document.getElementById("error_nombre");                                                     
    let mensaje_error_password = document.getElementById("error_password"); 
    let mensaje_error_tipo = document.getElementById("error_tipo");
   

    // Expresiones regulares 
    let regex = /^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s-]+$/; // REGEX para letras (incluye acentos y espacios)
    let regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
    /**
     * La contraseña debe tener:

      ✔ al menos 1 minúscula
      ✔ al menos 1 mayúscula
      ✔ al menos 1 número
      ✔ mínimo 6 caracteres

     */

   // ----------- validación nombre -------------
    if (nombre === "") {
      e.preventDefault();     

      // mensaje de error       
      mensaje_error_nombre.textContent = "El nombre usuario obligatorio";        
      return;
    }

    if (!regex.test(nombre)) {
      e.preventDefault();       
      mensaje_error_nombre.textContent = "El nombre no puede contener números";        
      return;
    }

    if (nombre.length < 2) {
      e.preventDefault();        
      mensaje_error_nombre.textContent = "Minimo dos caracteres";        
      return;
    }

     mensaje_error_nombre.textContent = ""; // limpiamos mensaje

    // validación contraseña 
    if(password === ""){
      e.preventDefault(); 
      mensaje_error_password.textContent = "Este campo no puede quedar vacío";
      return;
    }    

    if (!regexPassword.test(password)) {
      e.preventDefault();
      mensaje_error_password.textContent =
          "La contraseña debe tener mayúscula, minúscula y número (mín. 6 caracteres)";
      mensaje_error_password.style.color = "red";
      return;
    }

     mensaje_error_password.textContent = ""; 

    // validación tipo de usuario 
    if(tipo === ""){
      e.preventDefault();
      mensaje_error_tipo.textContent = "Elige una opción";
      return;
    }

    mensaje_error_tipo.textContent = "";

    });
});