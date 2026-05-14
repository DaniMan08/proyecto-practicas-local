
// ------------ VALIDACIÓN FORMULARIOS ---------------

document.addEventListener("DOMContentLoaded", function () { // Esperamos a que el DOM este cargado

    // seleccionamos el formulario y lo dejamos a la escuha del evento(enviar formulario submit)
  document.querySelector("form").addEventListener("submit", function (e) {

    // capturamos los datos de los campos del formulario 
    let nombre = document.getElementById("nombre").value.trim(); // trim elimina espacios en blanco
    let apellidos = document.getElementById("apellidos").value.trim();
    let email = document.getElementById("email").value.trim(); 
    let telefono = document.getElementById("telefono").value.trim();
    let fecha_alta = document.getElementById("fecha_alta").value;
   

    // Expresiones regulares 
    let regex = /^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s-]+$/; // REGEX para letras (incluye acentos y espacios)
    let regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    let regexTelefono = /^[0-9]{9}$/; 

    // capturamos los elemento html donde van a aparecer los mensajes de error
    let mensaje_error_nombre = document.getElementById("error_nombre");                                                     
    let mensaje_error_apellidos = document.getElementById("error_apellidos");
    let mensaje_error_email = document.getElementById("error_email");
    let mensaje_error_telefono = document.getElementById("error_telefono");
    let mensaje_error_fecha_alta = document.getElementById("error_fecha_alta");
   

    // ----------- validación nombre -------------
    if (nombre === "") {
      e.preventDefault();     

      // mensaje de error       
      mensaje_error_nombre.textContent = "El nombre es obligatorio";      
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

    // ------------ validación apellidos ---------------
    if(apellidos === ""){
     
        e.preventDefault();

        // mensaje de error
        mensaje_error_apellidos.textContent = "El campo apellidos es obligatorio";              
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

    // ------------ validación email --------------

    if(email === ""){

        e.preventDefault();

        // mensaje de error
        mensaje_error_email.textContent = "El campo email no puede quedar vacío";          
        return;
    }

      if (!regexEmail.test(email)) {
      e.preventDefault();       
      mensaje_error_email.textContent = "email incorrecto";            
      return;
    }

    mensaje_error_email.textContent = "";

    // validacion teléfono
      if(telefono === ""){

        e.preventDefault();

        // mensaje de error
        mensaje_error_telefono.textContent = "El campo telefono es obligatorio";            
        return;
      }

      if (!regexTelefono.test(telefono)) {
      e.preventDefault();       
      mensaje_error_telefono.textContent = "Teléfono incorrecto";         
      return;
      } 

    mensaje_error_telefono.textContent = "";

       // validación fecha_alta
      if (fecha_alta === "") {
        e.preventDefault();
        mensaje_error_fecha_alta.textContent = "La fecha es obligatoria";          
        return;
      } else {
          mensaje_error_fecha_alta.textContent = "";
      }    

  }); 

});



