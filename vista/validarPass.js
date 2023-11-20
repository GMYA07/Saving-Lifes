function validarPass() {
    var pass = document.getElementById("password").value;
    var expresion = /^(?=(?:\D*\d){1})(?=(?:[^\d]*[a-zA-Z]){4}).*$/;

    if (pass.length < 8) {
        alert("Faltan mas caracteres o numeros en tu contraseña");
        return false;
    }else if(pass.length > 10){
        alert("Cantidad de  caracteres o numeros de mas en tu contraseña");
        return false;

    }else if(!expresion.test(pass)){
        alert("La contraseña no cumple con los requisitos");
        return false;
    }else{
        alert("Ya puede iniciar sesion felicidades");
        return true;
    }
   
}