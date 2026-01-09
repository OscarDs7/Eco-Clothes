/*Función para cambiar propiedades cuando el curso se encuentre dentre de la caja de texto (input)  */
function entroEnFoco(elemento){
    elemento.className = "enfoco";
}

/* Función para cambiar la propiedad cuando sale del foco el componente caja de texto (input)*/
function salioDeFoco(elemento){
    if(elemento.value == ""){
        elemento.className="error";
    }else{
        elemento.className = "";
    }
}

function validarNombre(elemento)
{
    if(elemento.value != ""){
        var nombre = elemento.value;
        var expresion = /^([a-zA-Z\s]{3,30})+$/;
        if(!expresion.test(nombre)){
            alert("El nombre es muy pequeño o contiene números.");
            elemento.className = "error"; //se sombrea de color rojo en señal de un error
            document.getElementById("nombre").value = ""; //se limpia el campo
        }else{
            elemento.className = "";
        }
    }else{
        elemento.className = "error";
    }

}

function validarContrasena(elemento)
{
    if(elemento.value != ""){
        var contrasena = elemento.value;
        var expresion = /^([0-9]{8,30})+$/;
        if(!expresion.test(contrasena)){
            alert("La contraseña es muy pequeña o contiene números o espacios, revise bien!");
            elemento.className = "error"; //se sombrea de color rojo en señal de un error
            document.getElementById("contrasena").value = ""; //se limpia el campo
        }else{
            elemento.className = "";
        }
    }else{
        elemento.className = "error";
    }

}

function registrarUsuario(event)
{
    let nom = document.getElementById("nombre").value;
    let cont = document.getElementById("contrasena").value;

    if(nom == '' || cont == ''){
        event.preventDefault(); //no permite que la información se envie a la BD
        alert("Alguno de los campos se encuentra vacío, favor de llenarlo de forma correcta");
        return false;
    }

}

function ingresarLogin(event)
{
    let nom = document.getElementById("nombre").value;
    let cont = document.getElementById("contrasena").value;

    if(nom == '' || cont == ''){
        event.preventDefault(); //no permite que la información se envie a la BD
        alert("Alguno de los campos se encuentra vacío o no tiene aún cuenta acceso, , favor de registrarse.");
        return false;
    }

}